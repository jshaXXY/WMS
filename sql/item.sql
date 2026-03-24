create table item
(
    id             int auto_increment
        primary key,
    sku            char(64)  null,
    item_name      char(255) null,
    supplier       int       null,
    customer       int       null,
    in_stock_time  datetime  null,
    out_stock_time datetime  null,
    quantity       int       null
);

create index item_customer_id_fk
    on item (customer);

create index item_supplier_id_fk
    on item (supplier);

INSERT INTO wms.item (id, sku, item_name, supplier, customer, in_stock_time, out_stock_time, quantity) VALUES (11, 'SKU00011', 'Astra Rapid Hand Truck', 2, 10, '2025-11-30 20:46:00', '2026-01-16 16:10:00', 123);
INSERT INTO wms.item (id, sku, item_name, supplier, customer, in_stock_time, out_stock_time, quantity) VALUES (27, 'SKU00027', 'Titan Premium Storage Box', 9, 8, '2025-09-12 21:53:00', null, 14);
INSERT INTO wms.item (id, sku, item_name, supplier, customer, in_stock_time, out_stock_time, quantity) VALUES (7, 'SKU00007', 'Titan Compact Pallet Wrap', 7, 2, '2025-11-07 01:40:00', null, 24);
INSERT INTO wms.item (id, sku, item_name, supplier, customer, in_stock_time, out_stock_time, quantity) VALUES (25, 'SKU00025', 'PrimeLine Ultra Hand Truck', 7, 7, '2025-04-26 16:55:00', '2025-07-12 02:16:00', 1351);
INSERT INTO wms.item (id, sku, item_name, supplier, customer, in_stock_time, out_stock_time, quantity) VALUES (14, 'SKU00014', 'BluePeak Premium Storage Box', 3, 10, '2025-12-23 05:58:00', null, 121);
INSERT INTO wms.item (id, sku, item_name, supplier, customer, in_stock_time, out_stock_time, quantity) VALUES (4, 'SKU00004', 'Nova Durable Storage Box', 8, 6, '2025-06-13 14:52:00', '2025-10-26 15:16:00', 124);
INSERT INTO wms.item (id, sku, item_name, supplier, customer, in_stock_time, out_stock_time, quantity) VALUES (6, 'SKU00006', 'BluePeak Ultra Pallet Wrap', 3, 10, '2025-08-29 08:09:00', '2026-01-14 09:00:00', 52);
INSERT INTO wms.item (id, sku, item_name, supplier, customer, in_stock_time, out_stock_time, quantity) VALUES (10, 'SKU00010', 'Metro Pro Hand Truck', 1, 10, '2025-06-24 17:26:00', null, 12);
INSERT INTO wms.item (id, sku, item_name, supplier, customer, in_stock_time, out_stock_time, quantity) VALUES (24, 'SKU00024', 'Horizon Ultra Wireless Scanner', 7, 3, '2025-04-16 11:02:00', null, 241);
INSERT INTO wms.item (id, sku, item_name, supplier, customer, in_stock_time, out_stock_time, quantity) VALUES (16, 'SKU00016', 'Orion Pro Carton Sealer', 1, 5, '2025-09-04 06:54:00', '2025-09-23 09:22:00', 0);
INSERT INTO wms.item (id, sku, item_name, supplier, customer, in_stock_time, out_stock_time, quantity) VALUES (26, 'SKU00026', 'Orion Premium Wireless Scanner', 7, 2, '2025-02-10 05:42:00', null, 124);
INSERT INTO wms.item (id, sku, item_name, supplier, customer, in_stock_time, out_stock_time, quantity) VALUES (1, 'SKU00001', 'Nova Compact Hand Truck', 9, 2, '2025-06-23 18:19:00', null, 124);
INSERT INTO wms.item (id, sku, item_name, supplier, customer, in_stock_time, out_stock_time, quantity) VALUES (21, 'SKU00021', 'Vertex Classic Wireless Scanner', 10, 1, '2025-07-28 21:52:00', null, 52);
INSERT INTO wms.item (id, sku, item_name, supplier, customer, in_stock_time, out_stock_time, quantity) VALUES (15, 'SKU00015', 'Metro Compact Label Printer', 5, 8, '2025-12-29 19:06:00', '2026-01-22 22:19:00', 648);
INSERT INTO wms.item (id, sku, item_name, supplier, customer, in_stock_time, out_stock_time, quantity) VALUES (20, 'SKU00020', 'Nova Premium Pallet Wrap', 10, 9, '2025-03-06 20:27:00', null, 45);
INSERT INTO wms.item (id, sku, item_name, supplier, customer, in_stock_time, out_stock_time, quantity) VALUES (29, 'SKU00029', 'Vertex Fresh Safety Gloves', 6, 8, '2025-07-01 13:31:00', null, 375);
INSERT INTO wms.item (id, sku, item_name, supplier, customer, in_stock_time, out_stock_time, quantity) VALUES (23, 'SKU00023', 'Zenith Pro Label Printer', 8, 10, '2025-04-13 06:02:00', null, 64);
INSERT INTO wms.item (id, sku, item_name, supplier, customer, in_stock_time, out_stock_time, quantity) VALUES (13, 'SKU00013', 'BluePeak Pro Thermal Paper', 9, 8, '2025-11-09 12:51:00', '2025-12-08 02:47:00', 2623);
INSERT INTO wms.item (id, sku, item_name, supplier, customer, in_stock_time, out_stock_time, quantity) VALUES (22, 'SKU00022', 'Titan Smart Storage Box', 6, 10, '2026-01-18 11:20:00', null, 235);
INSERT INTO wms.item (id, sku, item_name, supplier, customer, in_stock_time, out_stock_time, quantity) VALUES (3, 'SKU00003', 'PrimeLine Durable Label Printer', 1, 10, '2025-03-05 00:47:00', '2026-01-16 05:33:00', 1);
INSERT INTO wms.item (id, sku, item_name, supplier, customer, in_stock_time, out_stock_time, quantity) VALUES (19, 'SKU00019', 'Titan Eco Label Printer', 7, 3, '2025-12-16 09:19:00', null, 15);
INSERT INTO wms.item (id, sku, item_name, supplier, customer, in_stock_time, out_stock_time, quantity) VALUES (18, 'SKU00018', 'Zenith Fresh Shipping Carton', 8, 2, '2025-07-27 07:17:00', null, 371);
INSERT INTO wms.item (id, sku, item_name, supplier, customer, in_stock_time, out_stock_time, quantity) VALUES (28, 'SKU00028', 'Metro Compact Wireless Scanner', 8, 8, '2025-05-13 22:42:00', '2025-12-01 17:51:00', 538);
INSERT INTO wms.item (id, sku, item_name, supplier, customer, in_stock_time, out_stock_time, quantity) VALUES (9, 'SKU00009', 'PrimeLine Durable Barcode Tag', 9, 5, '2025-11-23 12:44:00', null, 436);
INSERT INTO wms.item (id, sku, item_name, supplier, customer, in_stock_time, out_stock_time, quantity) VALUES (8, 'SKU00008', 'Horizon Durable Shipping Carton', 2, 7, '2026-01-29 15:12:00', null, 735);
INSERT INTO wms.item (id, sku, item_name, supplier, customer, in_stock_time, out_stock_time, quantity) VALUES (12, 'SKU00012', 'Vertex Eco Carton Sealer', 8, 8, '2025-07-15 07:05:00', null, 735);
INSERT INTO wms.item (id, sku, item_name, supplier, customer, in_stock_time, out_stock_time, quantity) VALUES (17, 'SKU00017', 'Metro Rapid Inventory Bin', 9, 5, '2025-12-19 03:03:00', null, 46);
INSERT INTO wms.item (id, sku, item_name, supplier, customer, in_stock_time, out_stock_time, quantity) VALUES (2, 'SKU00002', 'PrimeLine Pro Barcode Tag', 10, 9, '2026-01-17 15:07:00', null, 156);
INSERT INTO wms.item (id, sku, item_name, supplier, customer, in_stock_time, out_stock_time, quantity) VALUES (30, 'SKU00030', 'Nova Pro Barcode Tag', 1, 4, '2025-05-15 23:44:00', '2025-12-13 13:19:00', 1);
INSERT INTO wms.item (id, sku, item_name, supplier, customer, in_stock_time, out_stock_time, quantity) VALUES (5, 'SKU00005', 'Titan Fresh Inventory Bin', 9, 2, '2025-09-22 17:24:00', '2026-01-05 04:58:00', 0);
