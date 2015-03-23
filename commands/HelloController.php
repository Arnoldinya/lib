<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";
    }

	public $aWords = [
		'Детство',
		'6',
		'7',
		'12',
		'12',
		'16',
		'17',
		'20',
		'25',
		'193',
		'281',
		'300',
		'1941',
		'1952',
		'1958',
		'1970',
		'1975',
		'1975',
		'1977',
		'1979',
		'1984',
		'1985',
		'1989',
		'1990',
		'1990',
		'1990',
		'1991',
		'1991',
		'1991',
		'1991',
		'1991',
		'1992',
		'1992',
		'1993',
		'1993',
		'1993',
		'1993',
		'1994',
		'1995',
		'1995',
		'1996',
		'1999',
		'2000',
		'2003',
		'2004',
		'2007',
		'2007',
		'2008',
		'2008',
		'2011',
		'2012',
		'«Внешняя',
		'«За',
		'«Игр',
		'«комиссией',
		'«Курсы',
		'«Принцип',
		'«тамбовской»',
		'«уголовном',
		'«школьную»',
		'(«401-я',
		'(1911—1998),',
		'(1940—1942)',
		'(23.2.1911',
		'(Rossija).[24]',
		'(боец',
		'(ГУВД,',
		'(дом',
		'(И.',
		'(ЛГУ)',
		'(ЛГУ).',
		'(научный',
		'(Путины,',
		'(разведка',
		'(с',
		'(спецшкола',
		'(старший',
		'(так',
		'(умер',
		'[16]',
		'12)',
		'1627/1628',
		'1960—1965',
		'1970—1975',
		'1985—1990',
		'1990-е',
		'2.8.1999)',
		'2000-е',
		'330-го',
		'86-й',
		'Arms',
		'Bank',
		'BNP-Drezdner',
		'Coat',
		'Cовета',
		'Federation.svg',
		'августа',
		'августе',
		'Автономная',
		'Автономные',
		'административных',
		'администрации',
		'Администрация',
		'Альберт',
		'американским',
		'Анатолию',
		'Анатолия',
		'Андропова',
		'аппарат',
		'апреля',
		'арестованным',
		'армией',
		'армии,',
		'аттестован',
		'Б.',
		'базе',
		'банков',
		'Басковом',
		'без',
		'безопасности',
		'безопасности.',
		'безопасности.[1][20]',
		'бизнесменом',
		'биржи',
		'благоприятствуемой',
		'блокаду',
		'блокады',
		'бобыль',
		'более',
		'Бородино',
		'боярина',
		'брата,',
		'бронзовой',
		'Буяновы,',
		'был',
		'Валентина',
		'валютной',
		'ведении',
		'ведомств',
		'Великой',
		'Великой',
		'вернулся',
		'вернулся',
		'Верховный',
		'весны',
		'взаимодействие',
		'Виктор',
		'Виктор',
		'Владимир',
		'Владимир',
		'Владимир',
		'Владимир',
		'Владимир',
		'Владимира',
		'Владимира',
		'Владимиром',
		'власти',
		'власть.[17]',
		'вместе',
		'вместо',
		'внешней',
		'Внешнеэкономическая',
		'внешнеэкономическим',
		'внешним',
		'внешним',
		'внешним',
		'Внешняя',
		'внимание',
		'вновь',
		'Внутренняя',
		'во',
		'во',
		'Во',
		'во',
		'во',
		'воевал,',
		'Военное',
		'возвращения',
		'возглавил',
		'воздействия',
		'возможностях',
		'возрасте',
		'войны',
		'войны',
		'войны',
		'войны).',
		'воли»,',
		'вопросам.',
		'вопросам.[23]',
		'вопросы',
		'вотчины',
		'впервые',
		'вплоть',
		'Впоследствии',
		'впоследствии',
		'время',
		'время',
		'время',
		'время',
		'время',
		'время',
		'встретил',
		'вступил',
		'всяких',
		'входили',
		'входили',
		'Выборы',
		'выборы:',
		'выборы:',
		'выдвинуто',
		'выслуге',
		'выступления',
		'Высшей',
		'высших',
		'выходил.[18]',
		'г.',
		'Г.',
		'г.[10]),',
		'Галенская,',
		'ГДР.[20]',
		'ГДР».',
		'германских',
		'ГКЧП,',
		'глава',
		'главе',
		'главой',
		'Гладковым',
		'год',
		'года',
		'года',
		'года',
		'года',
		'года',
		'года',
		'года',
		'года,',
		'года,',
		'года,',
		'годах',
		'годах',
		'годах',
		'годах',
		'году',
		'году',
		'году',
		'году',
		'году',
		'году',
		'году',
		'году',
		'году,',
		'году.[11]',
		'годы',
		'годы',
		'годы',
		'голень',
		'город',
		'Города',
		'города',
		'городского',
		'Госдумы',
		'Госдумы',
		'госкомпаний.',
		'гостиниц.',
		'Государственная',
		'государственного',
		'государственной',
		'государственной',
		'Государственный',
		'государственный',
		'государственных',
		'готовившим',
		'готовить',
		'граждан',
		'Греф,',
		'группировкой',
		'группой',
		'Д.',
		'Д.',
		'данной',
		'два',
		'дважды',
		'Дед,',
		'декабря',
		'дела',
		'депутатов',
		'депутатов',
		'депутатской',
		'Депутаты',
		'деревни',
		'детства',
		'дивизии',
		'диплома',
		'директора',
		'дифтерии',
		'для',
		'для',
		'для',
		'для',
		'Дмитрий',
		'до',
		'до',
		'до',
		'до',
		'до',
		'до',
		'добровольно',
		'доброй',
		'должности',
		'должности',
		'должность',
		'Дома',
		'доцента',
		'др.),',
		'Дрездене',
		'дрезденского',
		'другие)',
		'дружбы',
		'дума',
		'дяди',
		'Е.',
		'его',
		'его',
		'его',
		'Егорова.',
		'ему',
		'Жданова.',
		'же',
		'жила',
		'за',
		'за',
		'заводе',
		'заводе,',
		'загранкомандировки',
		'задержания',
		'закончил',
		'заместителем',
		'заместителем',
		'зампреда',
		'заняли',
		'запрещённой',
		'зарубежным',
		'зарубежных',
		'заслуги',
		'защищая',
		'звании',
		'звании',
		'значения',
		'Зубков,',
		'Ивана',
		'Иванов,',
		'Иванович',
		'Ивановна',
		'Из',
		'из',
		'из',
		'из',
		'из',
		'из',
		'из',
		'избрания',
		'известный',
		'известным',
		'изучал',
		'им.',
		'им.',
		'им.',
		'инвестиций',
		'иностранными',
		'института',
		'института),',
		'информации',
		'Испании,[30]',
		'исполнительного',
		'использовать',
		'июне',
		'июня',
		'к',
		'как',
		'как',
		'как',
		'капиталом',
		'кафедра',
		'квартире',
		'квартире',
		'КГБ',
		'КГБ',
		'КГБ',
		'КГБ',
		'КГБ',
		'КГБ',
		'КГБ',
		'КГБ',
		'КГБ',
		'КГБ.[21]',
		'КГБ.[21]',
		'КГБ.[22]',
		'КИ',
		'кладбище',
		'кладбище.[14][15]',
		'книге',
		'Козак,',
		'командировки',
		'комиссией',
		'комиссия',
		'Комитет',
		'комитет),',
		'комитета',
		'комитета',
		'комитета',
		'комитета',
		'комитета',
		'коммунальной',
		'компаниями,',
		'Конституционный',
		'Конституция',
		'контрразведки',
		'координация',
		'которую',
		'которые',
		'которые',
		'который',
		'КПСС.',
		'Краснознамённого',
		'Красной',
		'Края',
		'крестьянами',
		'круг',
		'крупным',
		'крупных',
		'кто',
		'Кудрин,',
		'Кумариным,',
		'куратором',
		'курсах',
		'Л.',
		'Л.',
		'Л.',
		'ЛГУ',
		'ЛГУ',
		'ЛГУ.',
		'ЛГУ.',
		'лейтенант',
		'Ленина',
		'Ленинград.',
		'Ленинграда',
		'Ленинграда',
		'Ленинграда',
		'Ленинграда',
		'Ленинграда.',
		'Ленинграде,',
		'Ленинграде.',
		'Ленинградский',
		'Ленинградского',
		'Ленинградского',
		'Ленинградского',
		'Ленинградского',
		'Ленсовета',
		'Ленсовета',
		'лет',
		'лет',
		'лет',
		'линии',
		'линии',
		'личного',
		'майора',
		'Мариной',
		'Мария',
		'марта',
		'марте',
		'массовой',
		'мастер',
		'Матвиенко',
		'материнской',
		'матерью.',
		'Мать,',
		'махинациях',
		'мая',
		'мая',
		'медалью',
		'Медведев',
		'Медведев,',
		'международного',
		'международном',
		'Международные',
		'международным',
		'меньшей',
		'мере,',
		'Меркурьев',
		'Меркурьева',
		'местом',
		'мечтал',
		'Миллер,',
		'Минобороны,',
		'Михаила',
		'младшим',
		'мнению',
		'многие',
		'Могила',
		'молодому',
		'Москве',
		'Москве.',
		'Мутко',
		'мэра,',
		'мэрии',
		'мэрии',
		'мэрии',
		'мэрии',
		'мэрии:',
		'мэрию',
		'Н.',
		'Н.',
		'на',
		'награждён',
		'назначен',
		'называемой',
		'Наиболее',
		'наиболее',
		'написал',
		'направлен',
		'народной',
		'народных',
		'Нарышкин',
		'Нарышкин,',
		'населения,',
		'находились',
		'нации»',
		'национальной',
		'Национальной',
		'начала',
		'начала',
		'начальника',
		'НДР.[25]',
		'не',
		'не',
		'не',
		'Невский',
		'него',
		'некого».[29]',
		'некоторых',
		'немецкий',
		'нескольких',
		'никакого',
		'Никитин',
		'Никитича',
		'носил',
		'ноябре',
		'о',
		'о',
		'О.',
		'об',
		'обвинение',
		'обвинению',
		'Области',
		'область',
		'обмен',
		'обучение',
		'обучение',
		'общественностью,',
		'общественными',
		'обязанностей',
		'обязанности',
		'один',
		'одним',
		'одногодичный',
		'окончания',
		'окончил',
		'окончил',
		'окончил',
		'окончил',
		'округа',
		'октября',
		'он',
		'он',
		'он',
		'ОПГ',
		'оперативного',
		'оперативным',
		'органами',
		'органах',
		'органах',
		'организаторов',
		'организации',
		'организации',
		'организации',
		'организациями.',
		'органов',
		'органов',
		'органов,',
		'Основная',
		'основным',
		'оставлять',
		'осуждённым',
		'от',
		'от',
		'ответственные',
		'ответу',
		'отдела',
		'отдела.',
		'отделе',
		'отделение',
		'отделении',
		'отделения,',
		'Отец',
		'Отечественной',
		'Отечественной',
		'отзывался',
		'отказался',
		'откомандирован',
		'открыт',
		'отцовской',
		'офицером',
		'официальным',
		'Охте',
		'П.',
		'палата,',
		'Парламентские',
		'партии',
		'партии',
		'партии',
		'партийных',
		'первого',
		'первой',
		'первым',
		'первых',
		'перед',
		'пережила',
		'переписи',
		'переподготовки',
		'переулке',
		'перехода',
		'перехода',
		'Петербург,',
		'петербургского',
		'Пискарёвском',
		'писцовой',
		'Платов,',
		'по',
		'по',
		'по',
		'По',
		'по',
		'по',
		'по',
		'по',
		'По',
		'по',
		'по',
		'по',
		'по',
		'по',
		'по',
		'по',
		'По',
		'По',
		'по',
		'поваром,',
		'повышен',
		'под',
		'подавал',
		'подводном',
		'подготовки',
		'подполковника',
		'поездок',
		'позже',
		'познакомился',
		'Политика',
		'политика',
		'политика',
		'политика',
		'Политическая',
		'Политические',
		'политическими',
		'полицией',
		'полка',
		'положение',
		'Помимо',
		'помощника',
		'помощником',
		'Поправки',
		'Портал:Политика',
		'порядке',
		'посвящённым',
		'после',
		'После',
		'После',
		'После',
		'после',
		'после',
		'пост',
		'посту',
		'поступил',
		'посты',
		'похоронен',
		'права).[19]',
		'Правительства',
		'правительства',
		'правительства',
		'правительства',
		'правительстве',
		'Правительство',
		'правоохранительных',
		'Предки',
		'предок',
		'предоставляла',
		'предполагаемым',
		'предприятий.',
		'Председатель',
		'Председатель',
		'Председатель',
		'председатель',
		'председателя',
		'председателя',
		'Президент',
		'президента',
		'президента',
		'президентом,',
		'Президентские',
		'преследовать',
		'преступной',
		'При',
		'привлечения',
		'привлечено',
		'признательностью',
		'прикрытием',
		'принадлежности.[9]',
		'прихода',
		'приходилось',
		'приходу',
		'проводила,',
		'программой',
		'продовольствием',
		'проживал',
		'Прокуратура',
		'прокуратура,',
		'против',
		'против',
		'протяжении,',
		'Проходил',
		'публикациям,',
		'Путин',
		'Путин',
		'Путин',
		'Путин',
		'Путин',
		'Путин',
		'Путин',
		'Путин',
		'Путин',
		'Путин',
		'Путин',
		'Путин,',
		'Путина',
		'Путина',
		'Путина',
		'Путина',
		'Путина',
		'Путина',
		'Путина',
		'Путина',
		'Путина',
		'Путина',
		'Путина',
		'Путина',
		'Путина,',
		'Путина,',
		'Путина,',
		'Путина,',
		'Путина,',
		'Путиным',
		'Путиных',
		'пыталась',
		'пятачок,',
		'Работа',
		'Работа',
		'работал',
		'работал',
		'работал',
		'работала',
		'работать',
		'работника.[23]',
		'работу',
		'работу',
		'работы',
		'работы',
		'работы',
		'рабочей',
		'разведка».',
		'разведки',
		'разведточке',
		'разведчиках',
		'развития,',
		'ранен',
		'ранний',
		'ранним',
		'рапорт',
		'рапорт',
		'распределению',
		'рассказывал,',
		'расследования',
		'региональное',
		'регистрационная',
		'рекомендовал',
		'ректора',
		'Республики',
		'Референдумы:',
		'родились',
		'Родился',
		'родителей',
		'рождения:',
		'Романова,',
		'России',
		'России',
		'России',
		'России',
		'России',
		'России',
		'России,',
		'российских',
		'российско-американских',
		'Россия',
		'руководил',
		'руководитель',
		'руководителя',
		'руководителя',
		'руководителя',
		'руководстве',
		'руководстве',
		'русский',
		'ряда',
		'с',
		'С',
		'с',
		'с',
		'С',
		'С',
		'С',
		'с',
		'с',
		'с',
		'С',
		'с',
		'с',
		'с',
		'с',
		'с',
		'с',
		'С.',
		'Салье',
		'Салье',
		'Салье»)',
		'самого',
		'Санкт-Петербурга',
		'Санкт-Петербурга',
		'Санкт-Петербурга',
		'Санкт-Петербурга,',
		'Санкт-Петербурга).',
		'Санкт-Петербурге',
		'Санкт-Петербурге',
		'своей',
		'своих',
		'связи',
		'связям',
		'связям',
		'связям',
		'связям',
		'связям,',
		'связям.[24]',
		'себя.[24]',
		'села',
		'семье',
		'Семья',
		'Серафимовском',
		'Сергей',
		'серии:',
		'Сечин,',
		'силовых',
		'система',
		'система',
		'системе',
		'скандал',
		'скончался',
		'следственном',
		'словам',
		'словам',
		'Служба',
		'службу',
		'служил',
		'СМИ',
		'снабжения',
		'снова',
		'Снова',
		'со',
		'собой',
		'собрание',
		'собственному',
		'Собчак',
		'Собчака',
		'Собчака',
		'Собчака,',
		'Собчака,',
		'Собчака.',
		'Собчаку',
		'Совет',
		'Совет',
		'советник',
		'советская',
		'советскими',
		'совместных',
		'Согласно',
		'Состав',
		'состава»',
		'сотрудника',
		'сотрудничества',
		'сохранив',
		'специальности',
		'Спиридон',
		'Спиридонович',
		'способствовал',
		'среднюю',
		'средств',
		'СССР',
		'СССР',
		'СССР—ГДР.',
		'СССР,',
		'СССР,',
		'СССР.',
		'СССР.[1]',
		'СССР.[20]',
		'СССР)',
		'став',
		'стал',
		'стал',
		'Сталина.[12]',
		'Станислава',
		'становления',
		'старостой',
		'старшего',
		'старших',
		'статья',
		'статья:',
		'стрелкового',
		'строй',
		'Суд',
		'Суд',
		'Судебная',
		'суды,',
		'СФ',
		'СФ',
		'сфере',
		'сыном',
		'сырьё.[26][27][28]',
		'также',
		'также',
		'также',
		'Таможенный',
		'Тверского',
		'Тверского',
		'те',
		'Тедом',
		'Тема',
		'Тёрнером.[23]',
		'территориальной',
		'территориальными',
		'территориальных',
		'территории',
		'тех,',
		'технологического',
		'течение',
		'то',
		'тогда',
		'тот',
		'третьим',
		'Тургиново,',
		'тяжело',
		'у',
		'увлекался',
		'уволил.[29]',
		'увольнение',
		'увольнении',
		'удобств[17]',
		'уезда.',
		'уезда.',
		'Уже',
		'уклоном',
		'умерли',
		'университет',
		'университета',
		'упомянут',
		'управления',
		'управления',
		'управления',
		'устройство',
		'утверждению',
		'участии',
		'участник',
		'учебного',
		'учёбы',
		'учился',
		'учился',
		'фактически',
		'факультет',
		'факультет',
		'факультета',
		'фамилию',
		'федерального',
		'Федеральное',
		'Федеративное',
		'Федерации',
		'Фёдоровича[13].',
		'фильмами',
		'фирм.',
		'флоте,[11]',
		'Фомины',
		'Фото',
		'ФСБ,',
		'химическим',
		'ходе',
		'царя',
		'центральный',
		'часть',
		'часть',
		'человеку',
		'чинов;',
		'Члены',
		'что',
		'что',
		'чтобы',
		'Чурсановы,',
		'Шеломова',
		'Шеломовы,',
		'шестимесячных',
		'школа»),',
		'школе',
		'школе-восьмилетке',
		'школу',
		'штат',
		'Эта',
		'Это',
		'этой',
		'этой',
		'этот',
		'Ю.',
		'юность',
		'юридический',
		'юридического',
		'Юрием',
		'юстиции,',
		'юстиции,',
		'юстиции)',
		'являлся',
		'язык.',
		'Яков',
	];

	public $names = [
		'Аарон', 
		'Абрам', 
		'Аваз', 
		'Аввакум', 
		'Август', 
		'Августа', 
		'Авдей', 
		'Авраам', 
		'Аврора', 
		'Автандил', 
		'Агап', 
		'Агата', 
		'Агафон', 
		'Агафья', 
		'Аггей', 
		'Аглая', 
		'Агнесса', 
		'Агния', 
		'Агриппина', 
		'Агунда', 
		'Ада', 
		'Адам', 
		'Аделина', 
		'Адель', 
		'Адиля', 
		'Адис', 
		'Адольф', 
		'Адриан', 
		'Адриана', 
		'Аза', 
		'Азалия', 
		'Азарий', 
		'Азат', 
		'Азиза', 
		'Аида', 
		'Айгуль', 
		'Айжан', 
		'Айрат', 
		'Акакий', 
		'Аким', 
		'Аксинья', 
		'Акулина', 
		'Алан', 
		'Алана', 
		'Алевтина', 
		'Александр', 
		'Александра', 
		'Алексей', 
		'Алена', 
		'Али', 
		'Алико', 
		'Алина', 
		'Алиса', 
		'Алихан', 
		'Алия', 
		'Алла', 
		'Алоиз', 
		'Алсу', 
		'Альберт', 
		'Альберта', 
		'Альбина', 
		'Альвина', 
		'Альжбета', 
		'Альфия', 
		'Альфред', 
		'Альфреда', 
		'Амадей', 
		'Амадеус', 
		'Амаль', 
		'Амаяк', 
		'Амвросий', 
		'Амелия', 
		'Амина', 
		'Анастасия', 
		'Анатолий', 
		'Анвар', 
		'Ангел', 
		'Ангелина', 
		'Андоим', 
		'Андре', 
		'Андрей', 
		'Анеля', 
		'Анжела', 
		'Аникита', 
		'Анисья', 
		'Анита', 
		'Анна', 
		'Антон', 
		'Антонина', 
		'Ануфрий', 
		'Ануш', 
		'Анфиса', 
		'Аполлинарий', 
		'Аполлинария', 
		'Арам', 
		'Ариадна', 
		'Ариана', 
		'Арий', 
		'Арина', 
		'Аристарх', 
		'Аркадий', 
		'Арман', 
		'Армен', 
		'Арно', 
		'Арнольд', 
		'Арсений', 
		'Арслан', 
		'Артем', 
		'Артемий', 
		'Артур', 
		'Архелия', 
		'Архип', 
		'Асия', 
		'Аскольд', 
		'Ассоль', 
		'Астра', 
		'Астрид', 
		'Ася', 
		'Аурелия', 
		'Афанасий', 
		'Афанасия', 
		'Ахмет', 
		'Ашот', 
		'Аэлита', 
		'Беатриса', 
		'Бежен', 
		'Белла', 
		'Бенедикт', 
		'Бенедикта', 
		'Берек', 
		'Береслава', 
		'Бернар', 
		'Берта', 
		'Биргит', 
		'Бирута', 
		'Богдан', 
		'Богдана', 
		'Боголюб', 
		'Божена', 
		'Болеслав', 
		'Бонифаций', 
		'Борис', 
		'Борислав', 
		'Борислава', 
		'Боян', 
		'Бронислав', 
		'Бронислава', 
		'Бруно', 
		'Булат', 
		'Вадим', 
		'Валентин', 
		'Валентина', 
		'Валерий', 
		'Валерия', 
		'Вальтер', 
		'Ванда', 
		'Варвара', 
		'Вардан', 
		'Варлаам', 
		'Варфоломей', 
		'Василий', 
		'Василина', 
		'Василиса', 
		'Вацлав', 
		'Велизар', 
		'Велор', 
		'Венедикт', 
		'Венера', 
		'Вениамин', 
		'Вера', 
		'Вероника', 
		'Веселина', 
		'Весна', 
		'Веста', 
		'Вета', 
		'Вида', 
		'Викентий', 
		'Виктор', 
		'Виктория', 
		'Вилен', 
		'Вилли', 
		'Вилора', 
		'Вильгельм', 
		'Виолетта', 
		'Виргиния', 
		'Виринея', 
		'Виссарион', 
		'Виталий', 
		'Виталия', 
		'Витаутас', 
		'Витольд', 
		'Владимир', 
		'Владислав', 
		'Владислава', 
		'Владлен', 
		'Владлена', 
		'Влас', 
		'Володар', 
		'Вольдемар', 
		'Всеволод', 
		'Вячеслав', 
		'Габриэлла', 
		'Гавриил', 
		'Галактион', 
		'Галина', 
		'Гарри', 
		'Гастон', 
		'Гаянэ', 
		'Гаяс', 
		'Гевор', 
		'Геворг', 
		'Гелена', 
		'Гелла', 
		'Геннадий', 
		'Генриетта', 
		'Генрих', 
		'Георгий', 
		'Георгина', 
		'Гера', 
		'Геральд', 
		'Герасим', 
		'Герман', 
		'Гертруда', 
		'Глафира', 
		'Глеб', 
		'Глория', 
		'Гордей', 
		'Гордон', 
		'Горислав', 
		'Гортензия', 
		'Градимир', 
		'Гражина', 
		'Грета', 
		'Григорий', 
		'Гузель', 
		'Гулия', 
		'Гульмира', 
		'Гульназ', 
		'Гульнара', 
		'Гурий', 
		'Густав', 
		'Давид', 
		'Дайна', 
		'Далия', 
		'Дамир', 
		'Дамира', 
		'Дана', 
		'Даниил', 
		'Даниэла', 
		'Данияр', 
		'Данута', 
		'Дарина', 
		'Дарья', 
		'Дебора', 
		'Демид', 
		'Демьян', 
		'Денис', 
		'Джамал', 
		'Джамиля', 
		'Джемма', 
		'Джереми', 
		'Джордан', 
		'Джулия', 
		'Джульетта', 
		'Диана', 
		'Дилара', 
		'Диля', 
		'Дина', 
		'Динара', 
		'Динасий', 
		'Диодора', 
		'Дионисия', 
		'Дмитрий', 
		'Добрыня', 
		'Доля', 
		'Доминика', 
		'Дональд', 
		'Донат', 
		'Донатос', 
		'Дора', 
		'Дорофей', 
		'Ева', 
		'Евангелина', 
		'Евгений', 
		'Евгения', 
		'Евграф', 
		'Евдоким', 
		'Евдокия', 
		'Евсей', 
		'Евстафий', 
		'Егор', 
		'Екатерина', 
		'Елена', 
		'Елизавета', 
		'Елизар', 
		'Елисей', 
		'Емельян', 
		'Еремей', 
		'Ермолай', 
		'Ерофей', 
		'Есения', 
		'Ефим', 
		'Ефимий', 
		'Ефимия', 
		'Ефрем', 
		'Жан', 
		'Жанна', 
		'Жасмин', 
		'Ждан', 
		'Жозефина', 
		'Жорж', 
		'Забава', 
		'Заира', 
		'Замира', 
		'Зара', 
		'Зарема', 
		'Зарина', 
		'Заур', 
		'Захар', 
		'Захария', 
		'Земфира', 
		'Зигмунд', 
		'Зинаида', 
		'Зиновий', 
		'Зита', 
		'Злата', 
		'Зоя', 
		'Зульфия', 
		'Зухра', 
		'Ибрагим', 
		'Иван', 
		'Иванна', 
		'Иветта', 
		'Ивона', 
		'Игнат', 
		'Игорь', 
		'Ида', 
		'Иероним', 
		'Изабелла', 
		'Измаил', 
		'Изольда', 
		'Израиль', 
		'Изяслав', 
		'Илария', 
		'Илзе', 
		'Илиан', 
		'Илиана', 
		'Илларион', 
		'Илона', 
		'Ильхам', 
		'Илья', 
		'Ильяс', 
		'Инара', 
		'Инга', 
		'Инесса', 
		'Инна', 
		'Иннокентий', 
		'Иоанна', 
		'Иоланта', 
		'Ион', 
		'Ионос', 
		'Иосиф', 
		'Ипполит', 
		'Ираида', 
		'Ираклий', 
		'Ирена', 
		'Иржи', 
		'Ирина', 
		'Ирма', 
		'Исаак', 
		'Исай', 
		'Исидор', 
		'Исидора', 
		'Искандер', 
		'Июлия', 
		'Ия', 
		'Казимир', 
		'Калерия', 
		'Камилла', 
		'Камиль', 
		'Капитолина', 
		'Карен', 
		'Карим', 
		'Карима', 
		'Карина', 
		'Карл', 
		'Каролина', 
		'Катарина', 
		'Ким', 
		'Кира', 
		'Кирилл', 
		'Кирилла', 
		'Клавдий', 
		'Клавдия', 
		'Клара', 
		'Кларисса', 
		'Клаус', 
		'Клемент', 
		'Клим', 
		'Климентина', 
		'Клод', 
		'Кондрат', 
		'Конкордий', 
		'Конрад', 
		'Константин', 
		'Констанция', 
		'Кора', 
		'Корней', 
		'Корнилий', 
		'Кристина', 
		'Ксанф', 
		'Ксения', 
		'Кузьма', 
		'Лаврентий', 
		'Лада', 
		'Лазарь', 
		'Лайма', 
		'Лана', 
		'Лариса', 
		'Лаура', 
		'Лев', 
		'Леван', 
		'Левон', 
		'Лейла', 
		'Лейсан', 
		'Ленар', 
		'Леокадия', 
		'Леон', 
		'Леонард', 
		'Леонид', 
		'Леонида', 
		'Леонтий', 
		'Леопольд', 
		'Леся', 
		'Лиана', 
		'Лидия', 
		'Лилиана', 
		'Лилия', 
		'Лина', 
		'Линда', 
		'Лия', 
		'Лола', 
		'Лолита', 
		'Луиза', 
		'Лука', 
		'Лукерья', 
		'Лукьян', 
		'Любим', 
		'Любовь', 
		'Любомила', 
		'Любомир', 
		'Людвиг', 
		'Людмила', 
		'Люсьен', 
		'Люция', 
		'Магда', 
		'Магдалина', 
		'Мадина', 
		'Мадлен', 
		'Май', 
		'Майя', 
		'Макар', 
		'Максим', 
		'Максимилиан', 
		'Максуд', 
		'Малика', 
		'Мальвина', 
		'Мансур', 
		'Мануил', 
		'Марат', 
		'Маргарита', 
		'Мариан', 
		'Марианна', 
		'Марика', 
		'Марина', 
		'Мария', 
		'Марк', 
		'Марселина', 
		'Марсель', 
		'Марта', 
		'Мартин', 
		'Марфа', 
		'Марьям', 
		'Матвей', 
		'Матильда', 
		'Махмуд', 
		'Мелания', 
		'Мелисса', 
		'Мераб', 
		'Мефодий', 
		'Мечеслав', 
		'Мила', 
		'Милада', 
		'Милан', 
		'Милана', 
		'Милена', 
		'Милица', 
		'Милолика', 
		'Милослава', 
		'Мира', 
		'Мирдза', 
		'Мирон', 
		'Мирослав', 
		'Мирослава', 
		'Мирра', 
		'Митрофан', 
		'Михаил', 
		'Михайлина', 
		'Михаэла', 
		'Мичлов', 
		'Модест', 
		'Моисей', 
		'Моника', 
		'Мстислав', 
		'Муза', 
		'Мурат', 
		'Муслим', 
		'Надежда', 
		'Назар', 
		'Назарий', 
		'Назира', 
		'Наиль', 
		'Наиля', 
		'Нана', 
		'Наталья', 
		'Натан', 
		'Нателла', 
		'Наум', 
		'Нелли', 
		'Неонила', 
		'Нестор', 
		'Ника', 
		'Никанор', 
		'Никита', 
		'Никифор', 
		'Никодим', 
		'Николай', 
		'Николь', 
		'Никон', 
		'Нильс', 
		'Нина', 
		'Нинель', 
		'Нисон', 
		'Нифонт', 
		'Нонна', 
		'Нора', 
		'Норманн', 
		'Овидий', 
		'Одетта', 
		'Оксана', 
		'Олан', 
		'Олег', 
		'Олесь', 
		'Олеся', 
		'Оливия', 
		'Ольга', 
		'Онисим', 
		'Орест', 
		'Осип', 
		'Оскар', 
		'Остап', 
		'Офелия', 
		'Павел', 
		'Павла', 
		'Памела', 
		'Панкрат', 
		'Парамон', 
		'Патриция', 
		'Пелагея', 
		'Петр', 
		'Пимен', 
		'Платон', 
		'Полина', 
		'Порфирий', 
		'Потап', 
		'Прасковья', 
		'Прокофий', 
		'Прохор', 
		'Равиль', 
		'Рада', 
		'Радий', 
		'Радмила', 
		'Радосвета', 
		'Раис', 
		'Раиса', 
		'Раймонд', 
		'Рамиз', 
		'Рамиль', 
		'Расим', 
		'Ратибор', 
		'Ратмир', 
		'Рафаил', 
		'Рафик', 
		'Рашид', 
		'Ревекка', 
		'Регина', 
		'Рем', 
		'Рема', 
		'Рената', 
		'Ренольд', 
		'Римма', 
		'Ринат', 
		'Рифат', 
		'Рихард', 
		'Ричард', 
		'Роберт', 
		'Роберта', 
		'Родион', 
		'Роза', 
		'Роксана', 
		'Ролан', 
		'Роман', 
		'Ростислав', 
		'Ростислава', 
		'Рубен', 
		'Рудольф', 
		'Рузанна', 
		'Рузиля', 
		'Румия', 
		'Руслан', 
		'Руслана', 
		'Рустам', 
		'Руфина', 
		'Рушан', 
		'Сабина', 
		'Сабир', 
		'Сабрина', 
		'Савва', 
		'Савелий', 
		'Саида', 
		'Саломея', 
		'Самсон', 
		'Самуил', 
		'Сандра', 
		'Сания', 
		'Санта', 
		'Сарра', 
		'Светлана', 
		'Святослав', 
		'Севастьян', 
		'Северин', 
		'Северина', 
		'Селена', 
		'Семен', 
		'Серафим', 
		'Серафима', 
		'Сергей', 
		'Сильва', 
		'Сима', 
		'Симона', 
		'Снежана', 
		'Созия', 
		'Сократ', 
		'Соломон', 
		'Софья', 
		'Спартак', 
		'Стакрат', 
		'Станимир', 
		'Станислав', 
		'Станислава', 
		'Стелла', 
		'Степан', 
		'Стефания', 
		'Стивен', 
		'Стоян', 
		'Султан', 
		'Сусанна', 
		'Таира', 
		'Таис', 
		'Таисия', 
		'Тала', 
		'Талик', 
		'Тамаз', 
		'Тамара', 
		'Тарас', 
		'Татьяна', 
		'Тельман', 
		'Теодор', 
		'Теодора', 
		'Тереза', 
		'Терентий', 
		'Тибор', 
		'Тигран', 
		'Тигрий', 
		'Тимофей', 
		'Тимур', 
		'Тина', 
		'Тит', 
		'Тихон', 
		'Томас', 
		'Томила', 
		'Трифон', 
		'Трофим', 
		'Ульманас', 
		'Ульяна', 
		'Урсула', 
		'Устин', 
		'Устина', 
		'Фаддей', 
		'Фаиза', 
		'Фаина', 
		'Фанис', 
		'Фания', 
		'Фаня', 
		'Фарид', 
		'Фарида', 
		'Фархад', 
		'Фатима', 
		'Фая', 
		'Федор', 
		'Федот', 
		'Фекла', 
		'Феликс', 
		'Фелиция', 
		'Феодосий', 
		'Фердинанд', 
		'Феруза', 
		'Фидель', 
		'Филимон', 
		'Филипп', 
		'Флора', 
		'Флорентий', 
		'Фома', 
		'Франсуаза', 
		'Франц', 
		'Фредерика', 
		'Фрида', 
		'Фридрих', 
		'Фуад', 
		'Харита', 
		'Харитон', 
		'Хильда', 
		'Христиан', 
		'Христина', 
		'Христос', 
		'Христофор', 
		'Христя', 
		'Цветана', 
		'Цезарь', 
		'Цецилия', 
		'Чеслав', 
		'Чеслава', 
		'Чингиз', 
		'Чулпан', 
		'Шакира', 
		'Шамиль', 
		'Шарлотта', 
		'Шерлок', 
		'Эвелина', 
		'Эдвард', 
		'Эдгар', 
		'Эдда', 
		'Эдита', 
		'Эдмунд', 
		'Эдуард', 
		'Элеонора', 
		'Элиза', 
		'Элина', 
		'Элла', 
		'Эллада', 
		'Элоиза', 
		'Эльвира', 
		'Эльга', 
		'Эльдар', 
		'Эльза', 
		'Эльмира', 
		'Эля', 
		'Эмилия', 
		'Эмиль', 
		'Эмин', 
		'Эмма', 
		'Эммануил', 
		'Эраст', 
		'Эрик', 
		'Эрика', 
		'Эрнест', 
		'Эрнестина', 
		'Эсмеральда', 
		'Этери', 
		'Юзефа', 
		'Юлиан', 
		'Юлий', 
		'Юлия', 
		'Юна', 
		'Юния', 
		'Юнона', 
		'Юрий', 
		'Юханна', 
		'Юхим', 
		'Ядвига', 
		'Яким', 
		'Яков', 
		'Ян', 
		'Яна', 
		'Янита', 
		'Янка', 
		'Януарий', 
		'Ярина', 
		'Яромир', 
		'Ярослав', 
		'Ярослава', 
		'Ясон'
	];

    public function actionSql()
    {
    	$t = microtime();
    	$connection = \Yii::$app->db;
		$connection->open();
		
		for ($k=1; $k <= 300; $k++) { 
			$sql = "insert into reader (name) values ";
			for ($i=0; $i < 100000; $i++) { 
				$sql .= "('".$this->wordGenerator()."'), ";
			}

			$sql = substr($sql, 0, -2);
			$connection->createCommand($sql)->execute();
			echo $k."\n";
		}

		$connection->close();
		echo (microtime() - $t)."\n";
    }

    public function wordGenerator()
    {    	
    	$count = rand(1, 5);
    	$aW = $this->names;

    	$aTitle = '';
    	for ($i=1; $i <= 2 ; $i++) { 
    		$index = rand(0, count($aW)-1);
    		$aTitle[] = $aW[$index];
    	}

    	return implode(' ', $aTitle);
    }
}