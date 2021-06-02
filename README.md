# Описание проекта

## Реализовать форму регистрации участников конференции

1. Встроить карту (google map или любую другую карту). Карта должнарасполагаться сверху и растягиваться на всю ширину страницы. Высотакарты должна быть 450px на десктопах. На карте должен быть отмеченадрес: 7060HollywoodBlvd,LosAngeles,CA
2. Форма распологается под картой с тайтлом “To participate in theconference, please fill out the form” и полями:
	- first name (required)
	- last name (required)
	- birthdate (required)
	- report subject (required)
	- country (required | выпадающий список со странами)
	- phone (required | формат "+1 (555) 555-5555")
	- email (required)
3. Под формой справа находится кнопка Next, при нажатии на нее, еслиданные валидны, юзер переходит на второй шаг.
4. Форма 2 имеет такие поля:
	- company (not require)
	- position (not require)
	- about me (not require | textatea)
	- photo (not require | file input)
5. После нажатия на кнопку Next юзер должен видеть вместо формы кнопкисоциальных сетей: FB, TW,  при нажатии на которые можно поделитьсяссылкой на форму. Сообщение для расшаривания в TW “Check out thisMeetup with SoCal AngularJS! ”
6. Под кнопками должна находится ссылка на страницу со списком всехучастников - All members (Кол-во пользователей)
7. Отображать список участников в таблице с полями:
	- photo(Отображать фото при регистрации или дефолтное, если фото не былозагружено)
	- full name (Выводить полное имя в одном поле)
	- report subject
	- email (Выводить ссылкой)
	
## Обязательные требования

	- Данные из формы должны сохраняться без перезагрузки страницы
	- Если на второй формеобновить страницу, юзер должен снова попасть на эту же форму
	- Еслиюзер заполнил только первую форму, все данные должны быть сохраненыи он должен отображаться в списке Allmembers
	- Адрес и текст шарилкидля TW должен храниться в конфиге
	- Для верстки можно использовать Bootstrap/Bulma/TailwindCSS
	- База данных MySQL
	- PHP без фреймворков
	- Использовать любыебиблиотеки/фреймворки на JS
	- Использовать ООП и MVC
	- Использовать namespace
	- Использовать PDO для работы с базами данных

## Установка проекта

1. По которое должно быть установлено:
	- PHP
	- Apache
	- MySQL
	- Composer
2. Нужно загрузить себе на сервер базу данных проекта. Заходим в папку с проектом `cd formphp/databaseDump`, после пишем команду `mysql -uroot -ppassword -f record < record.sql`
3. Настройка Apache сервера:
	- Переходим в директорию с конфигурациями Apache `cd /etc/apache2/sites-available/`
	- Создаем конфигурационный файл `sudo nano first.site.conf`
	- Добавлеям туда 
	```
	<VirtualHost *:80>
        ServerName first.site
        DocumentRoot /home/devusr/www/firstsite/formphp
        <Directory /home/devusr/www/firstsite/formphp>
                RewriteEngine on
                RewriteCond %{REQUEST_FILENAME} !-f
                RewriteCond %{REQUEST_FILENAME} !-d
                RewriteRule . index.php
                Require all granted
        </Directory>

        ErrorLog ${APACHE_LOG_DIR}/error.log
        CustomLog ${APACHE_LOG_DIR}/access.log combined
	</VirtualHost>
	```
	- После создания конфигурационного файла нужно дописать в `/etc/hosts` имя хоста
	```
	127.0.0.1    first.site
	```
	- Включаем модуль mod_rewrite в Apache `sudo a2enmod rewrite`
	- Перезагружаем Apache `sudo service apache2 restart`
4. Помещаем папку проект по пути `/home/devusr/www/firstsite/`
5. Подключаем пакеты и устанавливаем все зависимости `composer install`

***

# К запуску готов
	

