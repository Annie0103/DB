--會員
create table _member(
    member_ID varchar(10),
    member_type varchar(15),
    last_name varchar(5),
    first_name varchar(5),  
	psw char(15), 
	
    city varchar(3),
    district varchar(5),
    street varchar(5),
    num varchar(5),
    f varchar(3),
    zip_code varchar(5),
	phone varchar(10),
	modified_time datetime not null default current_timestamp on update current_timestamp,
	
    primary key(member_ID,member_type)
	
)ENGINE=INNODB;


--賣家
create table seller(
    seller_ID varchar(10),
    
    primary key(seller_ID),
    foreign key(seller_ID)	references _member(member_ID)
	    on update cascade 
		on delete cascade
)ENGINE=INNODB;



--商品分類
create table category (
    kind_ID int auto_increment,
    kind_name varchar(20),
    primary key(kind_ID)
)ENGINE=INNODB;

--商品
create table good(
    good_ID int not null auto_increment , 
    seller_ID varchar(10),
    good_name varchar(20),
    price numeric(15,0),
    good_kind_ID int,
	quantity numeric(15,0), 
	good_picture blob,
	
	
	Provider varchar(20),
    Produce_date date,
    Made_in varchar(20),
    Introduce text,
	
	
	sold_out int default 0,
	
	
    create_time datetime not null default current_timestamp,
    modified_time datetime not null default current_timestamp on update current_timestamp,
    primary key(good_ID),
    foreign key(seller_ID)references seller(seller_ID)
        on delete cascade 
		on update cascade ,
    foreign key(good_kind_ID)references category(kind_ID)
	    set NULL
		on update cascade
		
)ENGINE=INNODB;



--購物車
create table shopping_cart(
    consumer_ID varchar(10),
    good_ID int,

	primary key(consumer_ID),
	foreign key(consumer_ID)references _member(member_ID)
	    on delete cascade 
		on update cascade,
	foreign key(good_ID) references good(good_ID)
	    on delete cascade
		on update cascade,	
	
)ENGINE=INNODB;


--訂單
create table _order(
    consumer_ID varchar(10),
    order_ID int auto_increment,
    build_time datetime not null default current_timestamp,
    accept_time timestamp null,
    state_of_bill varchar(1) default 0,
	payway varchar(30),
    primary key(order_ID),
)ENGINE=INNODB;


--被訂商品
create table ordered_good(
    order_ID int,
    good_ID int,
    quantity numeric(15,0),
	uniprice numeric(15,0),
	consumer_ID varchar(10),
    foreign key(order_ID)references _order (order_ID)
	on update cascade,
    foreign key(good_ID) references good(good_ID)
	on update cascade,
    primary key(order_ID,good_ID)
)ENGINE=INNODB;



--喜愛清單
create table like_list(
    consumer_ID varchar(10),
    good_ID int,
    primary key(consumer_ID,good_ID),
	foreign key(good_ID) references good(good_ID)
	    on delete cascade,
)ENGINE=INNODB;


--留言板
create table post(
    post_Time datetime not null default current_timestamp,
    content text,
    post_ID varchar(10),
    member_ID varchar(10),
    good_ID int,
    primary key (post_ID),
	foreign key (good_ID) references good(good_ID)
	   on delete cascade
	   on update cascade
)ENGINE=INNODB;