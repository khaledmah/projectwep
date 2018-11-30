drop database Hotel_Resturant;
create database Hotel_Resturant;
use Hotel_Resturant;
create table Login(username varchar(20),password varchar(20));
insert into Login(username,password)values('Manager','Manager'),('Receptionist','receptionist'),('Casher','casher');
create table Hotel(id int primary key auto_increment,hotel_name varchar(20)not null);
create table Guest(id int primary key ,guest_name varchar(20)not null,age int not null);
create table Room(room_number int primary key auto_increment,number_of_bed int not null,
price float not null,type_of_room varchar(20) not null,hotel_id int not null references Hotel(id));

create table Reservation(guest_id int not null references Guest(id)ON DELETE CASCADE ON UPDATE CASCADE
,roomnumber int not null references Room(room_number),reservedtime datetime 
);

create table Resturant(id int primary key auto_increment,resturant_name varchar(20) not null,
hotel_id int not null references Hotel(id));
create table Food(id int primary key auto_increment,food_type varchar(20) not null,
food_name varchar(20) not null,resturant_id int not null references Resturant(id));
create table _Order(id int primary key auto_increment,food_id int not null references Food(id),
roomnumber int not null references Room(room_number));

insert into Hotel(hotel_name)value('the good night');
insert into Room(number_of_bed,price,type_of_room,hotel_id)values(2,10,'single',1),(5,1220,'single',1),(4,100,'Married',1),(2,110,'single',1),(3,120,'Married',1);
insert into Resturant(resturant_name,hotel_id)values('good food',1);
insert into Food(food_type,food_name,resturant_id)values('meat','meat',1),('chicken','chicken',1),('sandwich','meat sandwich',1),('drink','fruit juice',1);
SELECT username,password FROM Login;
SELECT username,password FROM Login where username='Manager' and password='manager';
select * from Guest;
delete from guest where id =10;
select * from Reservation;
insert into Reservation(guest_id,roomnumber, reservedtime) values (1,2,CURRENT_TIMESTAMP);
select * from _Order;
select id from Food where food_name='meat';