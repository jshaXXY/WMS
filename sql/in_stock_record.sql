create table in_stock_record
(
    id          int auto_increment
        primary key,
    record_time datetime null,
    supplier    int      null,
    item        int      null,
    quantity    int      null,
    operator    int      null
);

create index in_stock_record_item_id_fk
    on in_stock_record (item);

create index in_stock_record_supplier_id_fk
    on in_stock_record (supplier);

create index in_stock_record_users_id_fk
    on in_stock_record (operator);

