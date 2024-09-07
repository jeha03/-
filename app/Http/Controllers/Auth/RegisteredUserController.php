namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use ReCaptcha\ReCaptcha;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // Проверка reCAPTCHA
        $recaptcha = new ReCaptcha('6LfVNyQqAAAAABmFVFmy6gag9qMUFWnwTZQK9H2n');
        $response = $request->input('g-recaptcha-response');
        $remoteIp = $request->getClientIp();

        $verify = $recaptcha->verify($response, $remoteIp);

        if (!$verify->isSuccess()) {
            // Если проверка reCAPTCHA не пройдена, возвращаем пользователя обратно с ошибкой
            return back()->withErrors(['g-recaptcha' => 'Не удалось пройти проверку reCAPTCHA'])->withInput();
        }

        // Валидация данных формы (происходит только после успешной проверки reCAPTCHA)
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Создание нового пользователя
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Событие регистрации пользователя
        event(new Registered($user));

        // Авторизация пользователя
        Auth::login($user);

        // Редирект на домашнюю страницу
        return redirect(RouteServiceProvider::HOME);
    }
}
