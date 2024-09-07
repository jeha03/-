# Использование конкретной версии MySQL
FROM mysql:8.0
LABEL maintainer="admin@hh-soft.ru"

# Выполнение привилегированных действий
USER root

# Установка vim


# Копирование и настройка скрипта инициализации
COPY /files/init.sh /docker-entrypoint-initdb.d/
RUN chmod +x /docker-entrypoint-initdb.d/init.sh

# Создание директории для SQL файлов
RUN mkdir /temp_sql
COPY /files/sql /temp_sql

# Возврат к оригинальному пользователю
USER mysql
