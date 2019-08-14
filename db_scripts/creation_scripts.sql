create DATABASE craftsvatika;
use craftsvatika;

/* Admin login table */
create table admin(
admin_id integer primary key,
adm_username varchar(100) not null,
adm_password varchar(100) not null,
last_login_timestamp datetime
);

/* Craft table */
create table craft(
craftId integer primary key,
craftName varchar(255) not null,
craftCity varchar(255),
craftState varchar(255),
craftDescription varchar(58000) not null,
craftPicture varchar(250),
craftType varchar(250) not null,
craftPopularityIndex integer not null,
craftIsDeleted varchar(1) not null,
craftRowTimeStamp  timestamp not null
);

/* Contact table */
create table contact(
ctc_id integer primary key,
ctc_phone varchar(10) not null,
ctc_mail varchar(255) not null,
ctc_query varchar(1000) not null,
ctc_isDeleted varchar(1) not null,
ctc_rowtimestamp timestamp not null
);

/* Image Changer table */
create table banner(
banner_id integer primary key,
banner_picture varchar(250) not null,
banner_heading varchar(50) not null,
banner_description varchar(100) not null,
banner_isDeleted varchar(1) not null,
banner_rowtimestamp  timestamp not null
);

/* News table */
create table news(
news_id integer primary key,
news_picture varchar(250),
news_heading varchar(100) not null,
news_description varchar(50000) not null,
news_writer varchar(100),  
news_isDeleted varchar(1) not null,
news_creationtimestamp datetime not null,
news_rowtimestamp timestamp not null
);

/* Blog table */
create table blog(
blog_id integer primary key,
blog_picture varchar(250),
blog_heading varchar(100) not null,
blog_description varchar(50000) not null,
blog_writer varchar(100),  
blog_isDeleted varchar(1) not null,
blog_creationtimestamp datetime not null,
blog_rowtimestamp timestamp not null
);

/* Event table */
create table event(
event_id integer primary key,
event_picture varchar(250) not null,
event_heading varchar(100) not null,
event_description varchar(50000) not null,
event_date datetime not null,
event_isDeleted varchar(1) not null,
event_creationtimestamp datetime not null,
event_rowtimestamp timestamp not null
);

/* States table */
create table states(
state_id integer primary key,
state_name varchar(30) NOT NULL
);

/* Cities table */
create table cities(
city_id int(11) primary key,
city_name varchar(30) not null,
state_id int(11) not null
);