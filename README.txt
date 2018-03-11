������� ��������!

1. ���� ���� https://github.com/yiisoft/yii2-sphinx (��� ������������ =)), 
� �����
 php composer.phar require --prefer-dist yiisoft/yii2-sphinx
2. �������� �����������, ������ � �.�. �� ����� ������, ����� - ��� ����������� �����.
� ������� 

'components' => [
        'sphinx' => [
            'class' => 'yii\sphinx\Connection',
            'dsn' => 'mysql:host=127.0.0.1;port=9306;dbname = yiiDb',
            'username' => '',
            'password' => '',
        ],

������ ���� ������
3. �� ������� ����� �� ssh( � ���� ������ ubuntu 16.04 lts)
���� Sphinx ����������:
sudo service sphinxsearch start

�� ������ ����������, ��������� - ��� ��!
�����: 
sudo service sphinxsearch stop
��������� � ���� ���������� �������:
cd /etc/spfinxsearch/
��� ����� ���� sphinx.conf ������������� ��� � ����� ���:
sphinx.conf_
����� ������� ���� ����:

sudo nano sphinx.conf

���� �������� ��� ��� (������ ������ ��������� ����������� � �� sql_host, sql_user,sql_pass,sql_db, �������� sql_port):

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
  morphology = stem_enru
  docinfo           = extern
  charset_type      = sbcs
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
����� �����������:

sudo indexer --all

����� ���������� - 

sudo service sphinxsearch start



������ ���������� ����� �� 2 ����� name_ru description_ru, � ajax ��� �� � ���� �� ����������,����� - ����� ���������/�������� 


