/*Users Table*/
insert into Users values('Daniel_A', 'password1', 'dadognra@kent.edu', '000-000-0000', 'Comp. Sci', 'Technician');
insert into Users values('Ryan_D', 'password2', 'rdarby4@kent.edu', '111-111-1111', 'Comp. Sci','Technician');
insert into Users values('Ian_W', 'password3', 'iwhitese@kent.edu', '222-222-2222', 'Comp. Sci','Technician');
insert into Users values('Yashashvi_R', 'password4', 'yrawat@kent.edu', '333-333-3333', 'Comp. Sci','Technician');
insert into Users values('Declan_B', 'password5', 'dbialowa@knt.edu', '444-444-4444', 'Comp. Sci','Technician');
insert into Users values('Shemon_R', 'password6', 'srawat1@kent.edu', '555-555-5555', 'Comp. Sci','Technician');
insert into Users values('TechAdmin', 'password7', 'tickit@gmail.com', '777-777-7777', 'Comp. Sci', 'Administrator');


/*Transaction_History Table*/

insert into Transaction_History values(000000, null, null, null, null, null, 'pending');
insert into Transaction_History values(000001, null, null, null, null, null, 'pending');
insert into Transaction_History values(000002, null, null, null, null, null, 'pending');

insert into Transaction_History values(111110,32.82, 'Service Fee', '2019-02-23', 'Credit Card', null, 'Paid');
insert into Transaction_History values(111111,50.00, 'Service Fee', '2019-01-12', 'Cash', null, 'Paid');
insert into Transaction_History values(111112,20.75, 'Service Fee', '2018-12-30', 'Credit Card', null, 'Paid');

/*Tickets Table*/
insert into Tickets values(000000, 'John Doe', 'JDoe@gmail.com', 'Cracked laptop screen', 9, 'installing new screen received by retailer', 'Daniel_A', 'In Progress', '2019-03-16', 'DELL', 'GDFJ876', 000000);
insert into Tickets values(000001, 'Jane Dow', 'FDeer@gmail.com', 'Bad hard drive', 6, 'replacing hard drive', 'Daniel_A', 'In Progress', '2019-03-14', 'HP', 'HUIJH67485', 000001);
insert into Tickets values(000002, 'Zeke Brunev', 'Genbu@gmail.com', 'Broken CD Drive', 7, 'replacing cd drive', 'Daniel_A', 'In Progress', '2019-03-11', 'DELL', 'HGYT432', 000002);

/*Archived Table*/
insert into Archived values(222222, 'James Neutron', 'Brainblast@yahoo.com', 'Not connecting to Internet', 9, 're-adding to domain', 'Ryan_D', 'Closed', '2019-03-16', 'HP', '888UHYSGY4', 111110);
insert into Archived values(222346, 'Bobby Tirkin', 'BTirk@kent.edu', 'Cracked Screen', 8, 'replacing screen with new one', 'Ryan_D', 'Closed', '2019-03-13', 'Lenovo', 'HUYSHEE', 111111);
insert into Archived values(123456, 'Jordan Cliff', 'JCliff@kent.edu', 'Screen will not turn on', 9, 'replacing hard drive', 'Ryan_D', 'Closed', '2019-03-12', 'DELL', 'IHU8758', 111112);