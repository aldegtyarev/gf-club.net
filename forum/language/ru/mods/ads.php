<?php
/**
*
* @package phpBB3 Advertisement Management
* @version $Id: ads.php 79 2009-01-24 17:02:13Z exreaction@gmail.com $
* @copyright (c) 2008 EXreaction, Lithium Studios
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ » “ ” …
//

$lang = array_merge($lang, array(
	'ADVERTISEMENT_MANAGEMENT_CREDITS'		=> 'Advertisements by <a href="http://www.lithiumstudios.org/">Advertisement Management</a>',

	// Default Positions
	'ABOVE_FOOTER'			=> 'Above Footer',
	'ABOVE_HEADER'			=> 'Above Header',
	'ABOVE_POSTS'			=> 'Above Posts',
	'AFTER_EVERY_POST'		=> 'After Every Post Except First',
	'AFTER_FIRST_POST'		=> 'After First Post',
	'BELOW_FOOTER'			=> 'Below Footer',
	'BELOW_HEADER'			=> 'Below Header',
	'BELOW_POSTS'			=> 'Below Posts',

	// ACP
	'0_OR_NA'									=> '0 или N/A',

	'ACP_ADVERTISEMENT_MANAGEMENT_EXPLAIN'		=> 'Здесь Вы можете изменить параметры настройки управления рекламой, добавить/удалить/изменить рекламную площадку, и добавить/удалить/изменить рекламные сообщения.',
	'ACP_ADVERTISEMENT_MANAGEMENT_SETTINGS'		=> 'Параметры управления рекламой',
	'ADS_ACCURATE_VIEWS'						=> 'Точное количество просмотров',
	'ADS_ACCURATE_VIEWS_EXPLAIN'				=> 'Делает подсчет количества показов более точным, но увеличивает нагрузку на сервер.',
	'ADS_COUNT_CLICKS'							=> 'Счетчик кликов',
	'ADS_COUNT_CLICKS_EXPLAIN'					=> 'Если установлено в нет, количество кликов по объявлению подсчитываться не будет (уменьшение нагрузки на сервер).',
	'ADS_COUNT_VIEWS'							=> 'Счетчик просмотров',
	'ADS_COUNT_VIEWS_EXPLAIN'					=> 'Если установлено в нет, количество показов объявления подсчитываться не будет (уменьшение нагрузки на сервер).',
	'AD_CREATED'								=> 'Объявление создано',
	'ADS_ENABLE'								=> 'Включить объявление',
	'ADS_RULES_FORUMS'							=> 'Использовать правила показа объявлений для форумов',
	'ADS_RULES_FORUMS_EXPLAIN'					=> 'Если включено, это позволит Вам управлять тем, в каких форумах будет показываться объявления. Если Вы не планируете использовать данную возможность, отключите эту опцию для использования ресурсов.',
	'ADS_RULES_GROUPS'							=> 'Использовать правила показа объявлений для групп',
	'ADS_RULES_GROUPS_EXPLAIN'					=> 'Если включено, это позволит Вам управлять тем, каким группам будут (не будут) показываться объявления. Если Вы не планируете использовать данную возможность, отключите эту опцию для использования ресурсов.',
	'ADS_VERSION'								=> 'Версия мода Управления рекламой',
	'ADVERTISEMENT'								=> 'Объявления',
	'ADVERTISEMENT_SPONSORS'						=> 'Реклама...',
	//'ADVERTISEMENT_SPONSORS'						=> 'Наши спонсоры',
	'ADVERTISEMENT_MANAGEMENT_UPDATE_SUCCESS'	=> 'Настройки управления рекламным объявлениями успешно обновлены!',
	'AD_ADD_SUCCESS'							=> 'Объявление успешно добавлено!',
	'AD_CLICK_LIMIT'							=> 'Лимит кликов',
	'AD_CLICK_LIMIT_EXPLAIN'					=> '0, чтобы отключить лимит, иначе объявление будет отключено, после указанного количества кликов.',
	'AD_CLICKS'									=> 'Количество кликов',
	'AD_CLICKS_EXPLAIN'							=> 'Текущее количество кликов по объявлению (если правильно настроено).',
	'AD_CODE'									=> 'Код объявления',
	'AD_CODE_EXPLAIN'							=> 'Код Вашего рекламного объявления.  Весь код должен быть помещен HTML-теги, BBcodes не поддерживается.<br /><strong>Если Вы хотите включить счетчик кликов, используйте {COUNT_CLICK} в любом месте, где разрешено использование атрибута onclick (например тег а ).</strong>',
	'AD_EDIT_SUCCESS'							=> 'Рекламное объявление успешно отредактированно!',
	'AD_ENABLED'								=> 'Отображать объявление',
	'AD_ENABLED_EXPLAIN'						=> 'Уберите галочку, для отключения показа.',
	'AD_FORUMS'									=> 'Список форумов',
	'AD_FORUMS_EXPLAIN'							=> 'Выберите форумы, в которых Вы хотите демонстрировать это объявление. Вы можете выбрать несколько форумов, удерживая клавишу CTRL нажатой.',
	'AD_GROUPS'									=> 'Группы',
	'AD_GROUPS_EXPLAIN'							=> 'Выберите группы, которым Вы <strong>НЕ</strong> хотите показывать это рекламное объявление. Вы можете выбрать несколько групп, удерживая клавишу CTRL нажатой.',
	'AD_LIST_NOTICE'							=> 'Подсчет кликов по объявлению будет доступен только в том случае, если Вы использовали {COUNT_CLICK} в месте, где доступен атрибут onclick.',
	'AD_MAX_VIEWS'								=> 'Максимальное количество просмотров',
	'AD_MAX_VIEWS_EXPLAIN'						=> 'Максимальное количество просмотров, после которого данное рекламное объявление отображаться не будет. <strong>0 значит без лимита</strong>.',
	'AD_NAME'									=> 'Имя объявления',
	'AD_NAME_EXPLAIN'							=> 'Используется только для различения Вами рекламных объявлений.',
	'AD_NOT_EXIST'								=> 'Выбранного объявления не существует.',
	'AD_NOTE'									=> 'Комментарии к объявлению',
	'AD_NOTE_EXPLAIN'							=> 'Оставьте Ваши комментарии, если хотите. Эти комментарии не будут нигде отображатся, кроме как в ACP.',
	'AD_POSITIONS'								=> 'Площадки',
	'AD_POSITIONS_EXPLAIN'						=> 'Выберите  площадку, на которой будет отображаться эта реклама. Вы можете выбрать несколько площадок, удерживая клавишу CTRL нажатой.',
	'AD_PRIORITY'								=> 'Приоритет объявления',
	'AD_PRIORITY_EXPLAIN'						=> 'Чем выше число, тем чаще будет демонстрироваться объявление. Для примера, 2 объявления с приоритетом 2 будут показываться с одинаковой частотой, но чаще, чем объявление с приоритетом 1, и реже, чем объявление с приоритетом 4.',
	'AD_TIME_END'								=> 'Показывать до',
	'AD_TIME_END_BEFORE_NOW'					=> 'Время окончания, в которое Вы ввели, соответствует прошедшему времени. Пожалуйста удостоверьтесь, что Вы используете strtotime совместимую дату.',
	'AD_TIME_END_EXPLAIN'						=> 'Введите корректную дату окончания показа объявления. По прошествии этой даты объявление автоматически отключится. Для этого используется PHP-функция <a href="http://us2.php.net/manual/en/function.strtotime.php">strtotime</a>, поэтому убедитесь, что задали формат правильно, иначе дата не будет установлена.<br /><br /><strong>Эта дата не учитывает часовой пояс, как таковой, поэтому на нее не стоит сильно полагаться. Рекомендуется задавать дату окончания показа с запасом в 1 день от планируемого.</strong>',
	'AD_VIEW_LIMIT'								=> 'Лимит просмотров',
	'AD_VIEW_LIMIT_EXPLAIN'						=> '0, чтобы отключить лимит, иначе объявление будет отключено, после указанного количества просмотров.',
	'AD_VIEWS'									=> 'Просмотры',
	'AD_VIEWS_EXPLAIN'							=> 'Текущее количество просмотров объявления.',
	'ALL_FORUMS_EXPLAIN'						=> 'Выберите, чтобы показывать во всех форумах и на всех страницах. Если этот параметр не выбран, объявления не будут показываться на страницах не форумов (например таких как ЧаВо).',

	'CREATE_AD'									=> 'Создать объявление',
	'CREATE_POSITION'							=> 'Создать площадку',

	'DELETE_AD'									=> 'Удалить объявление',
	'DELETE_AD_CONFIRM'							=> 'Вы уверенны, что хотите удалить это рекламное объявление?',
	'DELETE_AD_SUCCESS'							=> 'Рекламное объявление было успешно удалено!',
	'DELETE_POSITION'							=> 'Удалить площадку',
	'DELETE_POSITION_CONFIRM'					=> 'Вы уверенны, что хотите удалить эту рекламную площадку? Если Вы удалите эту площадку, любые рекламные объявления, которые показывались на ней, отображаться больше не будут.',
	'DELETE_POSITION_SUCCESS'					=> 'Площадка успешно удалена!',

	'FALSE'										=> 'Нет',

	'NO_ADS_CREATED'							=> 'Объявление не создано',
	'NO_AD_NAME'								=> 'Вы должны определить имя для рекламного объявления.',
	'NO_POSITIONS_CREATED'						=> 'Площадка не создана',

	'POSITION'									=> 'Площадка',
	'POSITION_CODE'								=> 'Код площадки',
	'POSITION_EDIT_SUCCESS'						=> 'Площадка успешно отредактирована!',
	'POSITION_NAME'								=> 'Имя площадки',
	'POSITION_NAME_EXPLAIN'						=> 'Имя рекламной площадки.',
	'POSITION_NOT_EXIST'						=> 'Выбранной площадки не существует.',
	'POSTITION_ADD_SUCCESS'						=> 'Площадка успешно добавлена!',
	'POSTITION_ALREADY_EXIST'					=> 'Вы уже имеете площадку с таким именем.',

	'TRUE'										=> 'Да',
));

?>