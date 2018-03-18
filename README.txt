Порядок действия!

1. Идем сюда https://github.com/yiisoft/yii2-sphinx (для ознакомления =)), 
и юзаем
 php composer.phar require --prefer-dist yiisoft/yii2-sphinx
2. Помещаем контроллеры, модели и т.д. по своим местам, вьюха - моя проверочная форма.
В конфиге 

'components' => [
        'sphinx' => [
            'class' => 'yii\sphinx\Connection',
            'dsn' => 'mysql:host=127.0.0.1;port=9306;dbname = yiiDb',
            'username' => '',
            'password' => '',
        ],

вводим свои данные
3. На сервере зайти по ssh( в моем случае ubuntu 16.04 lts)
если Sphinx установлен:
sudo service sphinxsearch start

он должен стартануть, стартанул - все ок!
далее: 
sudo service sphinxsearch stop
переходим в конф директорию сфинкса:
cd /etc/spfinxsearch/
там будет файл sphinx.conf переименовуем его я делал так:
sphinx.conf_
Далее создаем конф файл:

sudo nano sphinx.conf

туда копируем вот это (меняем только настройки подключения к бд sql_host, sql_user,sql_pass,sql_db, возможно sql_port):

source shop_products_content
{
  type          = mysql
  sql_host      = localhost
  sql_user      = admin
  sql_pass      = root
  sql_db        = yii2-basic
  sql_port      = 3306
  sql_query     = \
  SELECT id, name_ru, description_ru \
  FROM shop_products
  sql_query_pre = SET NAMES utf8
  sql_query_pre = SET CHARACTER SET utf8
  #sql_query     = \
  #SELECT id, content, status, content as content_attribute \
  #FROM news
  #sql_attr_uint = status
  #sql_attr_string = content_attribute
}
index idx_shop_products_content
{
  source            = shop_products_content
  path              = /var/lib/sphinxsearch/data/test1
  enable_star	= 1
  expand_keywords = 1
  min_infix_len = 3
  morphology = stem_enru
  docinfo           = extern
  charset_type      = utf-8
}
searchd
{
  listen            = localhost:9306:mysql41
  log               = /var/log/sphinxsearch/searchd.log
  query_log         = /var/log/sphinxsearch/query.log
  read_timeout      = 5
  max_children      = 30
  pid_file          = /var/run/sphinxsearch/searchd.pid
  max_matches       = 1000
  seamless_rotate   = 1
  preopen_indexes   = 1
  unlink_old        = 1
  binlog_path       = /var/lib/sphinxsearch/data


}
далее индексируем:

sudo indexer --all

после индексации - 

sudo service sphinxsearch start



Должен заработать поиск по 2 полям name_ru description_ru, с ajax что то у меня не сростается,туплю - нужно повторить/почитать 


