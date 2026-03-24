create table `order`
(
    id             int auto_increment
        primary key,
    customer       int      null,
    order_item     int      null,
    order_quantity int      null,
    order_time     datetime null
);

create index order_customer_id_fk
    on `order` (customer);

create index order_item_id_fk
    on `order` (order_item);

INSERT INTO wms.`order` (id, customer, order_item, order_quantity, order_time) VALUES (1, 1, 1, 2, '2026-03-10 10:38:24');
INSERT INTO wms.`order` (id, customer, order_item, order_quantity, order_time) VALUES (6, 1, 29, 3, '2026-03-11 12:18:00');
INSERT INTO wms.`order` (id, customer, order_item, order_quantity, order_time) VALUES (5, 1, 20, 1, '2026-03-10 13:20:00');
INSERT INTO wms.`order` (id, customer, order_item, order_quantity, order_time) VALUES (4, 8, 11, 111, '2026-03-10 12:55:00');
INSERT INTO wms.`order` (id, customer, order_item, order_quantity, order_time) VALUES (7, 3, 26, 7, '2026-03-11 12:20:00');
INSERT INTO wms.`order` (id, customer, order_item, order_quantity, order_time) VALUES (8, 2, 13, 1, '2026-03-11 12:30:00');
