<?

// я.RSS

/***************************************************************************

* Copyright (c) 2008, Yandex
* All rights reserved.
*
* Redistribution and use in source and binary forms, with or without
* modification, are permitted provided that the following conditions are met:
*     * Redistributions of source code must retain the above copyright
*       notice, this list of conditions and the following disclaimer.
*     * Redistributions in binary form must reproduce the above copyright
*       notice, this list of conditions and the following disclaimer in the
*       documentation and/or other materials provided with the distribution.
*     * Neither the name of the <organization> nor the
*       names of its contributors may be used to endorse or promote products
*       derived from this software without specific prior written permission.
*
* THIS SOFTWARE IS PROVIDED BY YANDEX ''AS IS'' AND ANY
* EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
* WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
* DISCLAIMED. IN NO EVENT SHALL YANDEX BE LIABLE FOR ANY
* DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
* (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
* LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
* ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
* (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
* SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

****************************************************************************/


// настройки
$botaccess=true; # провер€ть права bot access. ѕоставьте false, если параметра Enable search indexing вам достаточно.
$version=" revision 15.09.2008 (phpbb 3)";
$limit=40; # количество записей на 1-ой странице в RSS


// Smart SQL Query

	function S_ql ($str, $parms="")
	{
		$res = mysql_query ($str);

		if (!mysql_errno() && @mysql_num_rows($res))
		{
			if (mysql_num_rows($res) == 1 && $parms<>"more")
			{
				$result = mysql_fetch_array($res, MYSQL_ASSOC);
				if (count($result)==1) { sort ($result); return $result[0]; }
				return $result;
			};

			$result = array ();
			for ($i = 0; $i<mysql_num_rows($res); $i++)
			$result[] = mysql_fetch_array($res, MYSQL_ASSOC);

			return $result;
		}
		else
		{
			if (mysql_errno())
			{
				echo "Invalid query: ", $str, " ", mysql_error();
			}

			return false;

		}

	}


function stripBBCode($string) // bbcode -> html
{
   $BBTagsSimple = array(
       'b','i','u','s','sub','sup','h1','h2','h3','h4','h5','h6','code','li','right', 'left', 'center',
       'php', 'youtube','gvideo','\*','img',
   );
   //tags with (possible) value
   $BBTagsAttrib = array(
       'email', 'color', 'size', 'font', 'align', 'quote', 'list' ); //'url' it'll be folded into <a> furher
   $regexp = '/(\[\/?' . implode('(:[^\]\s]+)?\])|(\[\/?', $BBTagsSimple) . '(:[^\]\s]+)?\])';
   $regexp.= '|(\[\/?' . implode('(\=[^\]\s]+)?(:[^\]\s]+)?\])|(\[\/?', $BBTagsAttrib) . '(\=[^\]\s]+)?(:[^\]\s]+)?\])';
   $regexp .= '/';
   $string = preg_replace('/\[url(:[^\]\s]+)?\](.*)\[\/url(:[^\]\s]+)?\]/U', '<a href="$2">$2</a>', $string);
   $string = preg_replace('/\[url\=([^\]]+)(:.+)?\](.*)(\[\/url(:[^\]\s]+)?\])/U', '<a href="$1">$3</a>', $string);
   $string = preg_replace('/\[URL="([^"]*)"]([^\[]*)\[\/URL\]/', '<a href="$1">$2</a>', $string);
   $string = preg_replace('/\[quote=([^\]]*)\]/U', '<blockquote>', $string);
   $string = preg_replace('/\[\/quote([^\]]*)\]/U', '<\blockquote>', $string);
   $string = preg_replace($regexp, "", $string);
   return $string;
} 


function getrights ($forum) // проверка прав ботов на чтение форума
{
	global $table_prefix, $botaccess;
	if ($botaccess==false) return true;
	$bots_group_id = S_ql("SELECT group_id FROM {$table_prefix}groups WHERE group_type=3 AND group_name='BOTS'");
	$rights=S_ql ("SELECT auth_role_id from {$table_prefix}acl_groups WHERE forum_id='$forum' AND group_id='$bots_group_id'");
	if ($rights==19) return true;
	return false;
}

// подключаем конфиги форума
include "config.php";

$link = mysql_connect($dbhost, $dbuser, $dbpasswd) or $error = 1;
@mysql_select_db($dbname) or $error = 1;

// Header ("Content-Encoding: charset=windows-1251");
// S_ql ("SET NAMES 'cp1251'");  S_ql ("SET CHARACTER SET 'cp1251'");
//  S_ql ("SET NAMES 'utf8'");  S_ql ("SET CHARACTER SET 'utf8'");

// конфиги и get-параметры
	$t=S_ql ("SELECT * from {$table_prefix}config", "more");

	foreach ($t as $key=>$value) $C[$value['config_name']]=$value['config_value'];

	if ($C['server_protocol']=="") $C['server_protocol']="http://";

	$url=$C['server_protocol'].$C['server_name'].$C['script_path']; #url форума
	if ($url[strlen($url)-1]!="/") $url.="/";

	$smiles_path=$C['server_protocol'].$C['server_name']."/".$C['smilies_path'];
	$forum=intval ($_GET['forum']);
	$topic=intval ($_GET['topic']);
	$post=intval ($_GET['post']);
	$mode=$_GET['mode'];



// список всех RSS в opml (yarss.php?mode=opml)
if ($_GET['mode']=="opml")
{

header ("Content-Type: text/xml");

$t=S_ql ("SELECT * from {$table_prefix}forums WHERE forum_type!=0 AND enable_indexing=1 ORDER by forum_id", "more");

echo '<?xml version="1.0" encoding="windows-1251"?><opml version="1.0">
<head>
<title>Ya.rss opml file</title>
</head>
<body>
';

foreach ($t as $key=>$value) 
{
echo "<outline text='{$value['forum_name']}' type='rss' htmlUrl='{$url}viewforum.php?f={$value['forum_id']}' xmlUrl='{$url}yarss.php?forum={$value['forum_id']}' />
";
}

echo "</body></opml>";
exit;

}


// список всех RSS по умолчанию (yarss.php без параметров)
if ($_GET['forum']=="")
{

$t=S_ql ("SELECT * from {$table_prefix}forums WHERE forum_type!=0 AND enable_indexing=1 ORDER by forum_id", "more");

echo "<html><body><B>—писок разрешенных к индексации форумов в RSS:</B> (<a href=yarss.php?mode=opml>opml</a>)<p>";

foreach ($t as $key=>$value) 
			{
						echo "<a href=yarss.php?forum={$value['forum_id']}>{$value['forum_name']}</a> <small title='топики/комменты'>({$value['forum_topics']}/{$value['forum_posts']})";
						if (!getrights($value['forum_id'])) echo " ƒоступ к форуму закрыт ботам (группа bots), поэтому <font color=red>RSS отключен</font>.";
						echo "</small><br>";
			}

echo '<p><U>¬нимание</U>: ¬ RSS выдаютс€ только те форумы, в которых разрешено индексирование (настройка "Enable search indexing" в редактировании форума).<p>“еперь вы можете <a href=http://blogs.yandex.ru/add.xml>добавить</a> желаемые потоки в яндекс.ѕоиск по блогам.';

if ($botaccess) echo ' и те, у которых в настройке прав доступа у группы "bots" есть права "bot access".';

echo '</body></html>';

exit;

}


// ѕровер€ем, можно ли выдавать RSS из этого форума ("Enable search indexing").
	$t=S_ql ("SELECT forum_id, forum_name from {$table_prefix}forums WHERE forum_type!=0 AND enable_indexing=1 AND forum_id='$forum'");

	$forum = $t['forum_id'];
	$forumname=$t['forum_name'];

	if ($forum==0)
	{
		header("HTTP/1.0 404 Not Found");
		echo ("<html><body>Ётот форум не выдаетс€ в виде RSS или не существует.</body></html>");
		exit;
	}

// ѕровер€ем права ботов дл€ этого форума 
	$rights=getrights ($forum);
	if ($rights==false)
		{
		header("HTTP/1.0 404 Not Found");
		echo ("<html><body>Ётот форум не выдаетс€ в виде RSS, так как закрыт дл€ ботов.</body></html>");
		exit;
		}


// шапка RSS
$xml='<?xml version="1.0" encoding="windows-1251"?>
<rss version="2.0" xmlns:ya="http://blogs.yandex.ru/" xmlns:wfw="http://wellformedweb.org/CommentAPI/">
<channel>
<title>'.htmlspecialchars ($C['sitename'].' - '.$forumname).'</title>
<link>'.htmlspecialchars ($url).'</link>
<description>'.htmlspecialchars ($C['site_desc']).'</description>
<language>ru</language>
<managingEditor>'.$C['board_contact'].'</managingEditor>
<generator>Ya:Rss '.$version.'</generator>
';

// магический mysql-запрос, который все делает

	$s2="";
	$order="t.topic_id desc, post_id desc";
	
	if ($mode=="") $s1="="; else { $s1="<>"; $order="post_id desc"; } # только первые посты/остальные посты
	if ($topic!=0 && $mode=="") { $s2="AND t.topic_id<'$topic'"; $order="t.topic_id desc";}# листалка по тредам
	if ($post!=0 && $mode=="comments") { $s2="AND p.post_id<'$post'"; $order="post_id desc"; }# листалка по постам

	$t=S_ql ("SELECT t.*, p.*, u.username from {$table_prefix}topics as t, {$table_prefix}posts as p,  {$table_prefix}users as u WHERE t.topic_replies>0 AND p.poster_id=u.user_id AND topic_first_post_id".$s1."p.post_id AND topic_approved=1 AND p.topic_id=t.topic_id AND t.forum_id='$forum' ".$s2." ORDER by $order LIMIT $limit", "more");


// <item>-ы
if ($t!="") foreach ($t as $key=>$value)
{

$body=$value['post_text'];

// BBCode вы режим, никто же нам не говорит, что в <description> должно быть все с форматированием.
// $value['post_text']=preg_replace ("/\[[^\]]*\]/","",$value['post_text']);
$body=stripBBCode ($body);

// смайликам мы прописываем правильный путь
$body=str_replace ("{SMILIES_PATH}",$smiles_path,$body);


$body=html_entity_decode ($body);
$body=nl2br ($body);


$body=preg_replace('/[\x00-\x08\x0B-\x0C\x0E-\x19]/', '', $body);

$xml.="
<item>
<title>".htmlspecialchars($value['topic_title'])."</title>
";

if ($mode!="comments")
$xml.="<link>{$url}viewtopic.php?f={$value['forum_id']}&amp;t={$value['topic_id']}</link>";
else
$xml.="<link>{$url}viewtopic.php?f={$value['forum_id']}&amp;t={$value['topic_id']}&amp;p={$value['post_id']}#p{$value['post_id']}</link>";


if ($mode=="comments")
$xml.="
<ya:post>{$url}viewtopic.php?f={$value['forum_id']}&amp;t={$value['topic_id']}</ya:post>";

$xml.="
<guid isPermaLink='true'>{$url}viewtopic.php?f={$value['forum_id']}&amp;t={$value['topic_id']}</guid>
<description>".htmlspecialchars ($body)."</description>
<pubDate>".(date ("r",$value['topic_time']))."</pubDate>
<author>{$url}memberlist.php?mode=viewprofile&amp;u={$value['poster_id']}</author>
</item>";


if ($modif==false) 
	{
	$modif=true;
	header("Last-Modified: " . gmdate("D, d M Y H:i:s", $value['topic_time']) . " GMT"); # дата самого свежего сообщени€
	}

}


// листалка назад, если это не последн€€ страница
if ($post!=$value['post_id'] && $value['topic_id']!="") 
if ($mode!="comments")
$xml.="<ya:more>{$url}yarss.php?forum={$forum}&amp;topic={$value['topic_id']}</ya:more>";
	else
	$xml.="<ya:more>{$url}yarss.php?forum={$forum}&amp;post={$value['post_id']}&amp;mode={$mode}</ya:more>";


// ссылка на фид с комментами
if ($mode!="comments")
$xml.="<wfw:commentRss>{$url}yarss.php?forum={$forum}&amp;mode=comments</wfw:commentRss>";

$xml.="</channel></rss>";

header ("Content-Type: text/xml");
echo $xml;

?>