create table customer
(
    id            int auto_increment
        primary key,
    customer_name char(255) null
);

INSERT INTO wms.customer (id, customer_name) VALUES (1, 'AAAAA');
INSERT INTO wms.customer (id, customer_name) VALUES (2, 'SunFresh Superstore');
INSERT INTO wms.customer (id, customer_name) VALUES (3, 'BrightHome Essentials');
INSERT INTO wms.customer (id, customer_name) VALUES (4, 'CityCorner Convenience');
INSERT INTO wms.customer (id, customer_name) VALUES (5, 'QuickCart Online Shop');
INSERT INTO wms.customer (id, customer_name) VALUES (6, 'UrbanTaste Café Group');
INSERT INTO wms.customer (id, customer_name) VALUES (7, 'NorthStar Electronics');
INSERT INTO wms.customer (id, customer_name) VALUES (8, 'DailyNeeds Marketplace');
INSERT INTO wms.customer (id, customer_name) VALUES (9, 'HomePlus Furnishings');
INSERT INTO wms.customer (id, customer_name) VALUES (10, 'GoldenLeaf Pharmacy');
