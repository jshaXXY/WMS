create table out_stock_record
(
    id          int auto_increment
        primary key,
    record_time datetime null,
    customer    int      null,
    item        int      null,
    quantity    int      null,
    operator    int      null
);

create index out_stock_record_customer_id_fk
    on out_stock_record (customer);

create index out_stock_record_item_id_fk
    on out_stock_record (item);

create index out_stock_record_users_id_fk
    on out_stock_record (operator);

