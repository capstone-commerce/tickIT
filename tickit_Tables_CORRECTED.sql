
create table Users(
	username varchar(20),
	password varchar(20),
	email varchar(40),
	phone_number varchar(12),
	department varchar(20),
	primary key(username));


create table Transaction_History(
	transactionID numeric(6,0),
	amount float,
	charges varchar(50),
	date_of_payment date,
	payment_method varchar(20),
	notes varchar(100),
	status varchar(20),
	primary key(transactionID));

create table Archived(
    ticket_number numeric(6,0),
    customer_name varchar(20),
    customer_email varchar(30),
    issue varchar(100),
    urgency numeric(1,0),
    comments varchar(150),
    username varchar(20),
    status varchar(20),
    date_finished date,
    device_brand varchar(15),
    device_serialNumber varchar(40),
    transactionID numeric(6,0),
    primary key(ticket_number, transactionID),
    foreign key(transactionID) references Transaction_History(transactionID),
	foreign key(username) references Users(username));
	
create table Tickets(
    ticket_number numeric(6,0),
    customer_name varchar(20),
    customer_email varchar(30),
    issue varchar(100),
    urgency numeric(1,0),
    comments varchar(150),
    username varchar(20),
    status varchar(20),
    date_created date,
    device_brand varchar(15),
    device_serialNumber varchar(40),
    transactionID numeric(6,0),
    primary key(ticket_number, transactionID),
    foreign key(transactionID) references Transaction_History(transactionID),
    foreign key(username) references Users(username));
	
create table Ordered_Parts(
    partID varchar(20),
    ticket_number numeric(6,0),
    retailer varchar(20),
    type varchar(20),
    date_received date,
    primary key(partID));
	
create table Session(
	sessionID numeric(6,0),
	username varchar(20),
	last_login datetime,
	primary key(sessionID),
	foreign key(username) references Users(username));
	



	
