CREATE DATABASE IF NOT EXISTS tzzs_zzdb default charset utf8 COLLATE utf8_general_ci; 
use tzzs_db;
/* 用户表 */
create table i_user(
	u_Id int primary key not  null  auto_increment,
	u_Name varchar(16) not null,
	u_Sex varchar(4),
	u_Password varchar(64) not null,
	u_GroupId int not null,
	u_CreateDate datetime not null,
	u_Address varchar(96),
	u_QQ long,
	u_Phone long,
	u_Mailbox varchar(32),
	u_Lasttime datetime,
	u_LastIp varchar(16),
	u_Thistime datetime,
	u_ThisIp varchar(16),
	u_Number int not null
	
);
/* 公告管理 */
create table i_notice(
	n_Id int primary key not  null  auto_increment,
	n_Author varchar(16) not null,
	n_GroupId int  not null,
	n_PublishIp varchar(16) not null,
	n_Publishtime datetime not null,
	n_Content TEXT not null
);
/* 杂志上传 */ 
create table i_journal(
	j_Id int primary key not  null  auto_increment,
	j_Edition varchar(96) not null,
	j_Pathfile varchar(96) not null,
	j_Amount int not null,
	j_Author varchar(16) not null,
	j_GroupId int  not null,
	j_PublishIp varchar(16) not null,
	j_Publishtime datetime not null,
	j_Content TEXT not null,
	j_Click int not null
);
/* 联系我们 */
create table i_contact(
	c_Id int primary key not  null  auto_increment,
	c_Phone long  not null,
	c_Blog varchar(32) not null,
	c_Mailbox varchar(32),
	c_Author varchar(16) not null,
	c_GroupId int not null,
	c_PublishIp varchar(16) not null,
	c_Publishtime datetime not null
);
/* 友情链接 */
create table i_friend(
	f_Id int primary key not  null  auto_increment,
	f_Name varchar(96) not null,
	f_Image varchar(96) not null,
	f_Url varchar(128) not null,
	f_Author varchar(16) not null,
	f_GroupId int  not null,
	f_PublishIp varchar(16) not null,
	f_Publishtime datetime not null
);
/* 幻灯片 */
create table i_slide(
	s_Id int primary key not  null  auto_increment,
	s_Image varchar(96) not null,
	s_Name varchar(96) not null,
	s_Author varchar(16) not null,
	s_GroupId int not null,
	s_PublishIp varchar(16) not null,
	s_Publishtime datetime not null
);
/* 关键字 */
create table i_keyword(
	k_Id int primary key not  null  auto_increment,
	k_Description varchar(128) not null,
	k_Keywords varchar(32) not null,
	k_Author varchar(16) not null,
	k_GroupId int not null,
	k_PublishIp varchar(16) not null,
	k_Publishtime datetime not null
);
/* 备案信息 */
create table i_record(
	r_Id int primary key not  null  auto_increment,
	r_ICPmain varchar(32) not null,
	r_ICPweb varchar(32) not null,
	r_Author varchar(16) not null,
	r_GroupId int(3) not null,
	r_PublishIp varchar(16) not null,
	r_Publishtime datetime not null
);

INSERT INTO i_user (u_Name,u_Sex,u_Password,u_GroupId,u_CreateDate,u_Address,u_QQ,u_Phone,u_Mailbox,u_Number)
VALUES ('admin', '男', '560edbd23a46984600ca608db6e9d0ec6f2816f8', '255', '1970-01-01 0:0:0', '北京市-北京市-海淀区', '83117850', '13409597709', 'wzxaini9@vip.qq.com','0')
;
