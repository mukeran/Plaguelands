create database `test`;
use `test`;
create table if not exists `user` (
    `id` int(10) primary key auto_increment,
    `username` varchar(100) unique not null,
    `password` varchar(100) not null
);
create table if not exists `store` (
    `key` varchar(100) primary key not null,
    `value` varchar(10000)
);
insert into `user` (`username`, `password`) values ('admin', 'password');
insert into `store` (`key`, `value`) values ('stored_xss', 'Hi! Please test XSS!');