create table supplier
(
    id            int auto_increment
        primary key,
    supplier_name char(255) null
);

INSERT INTO wms.supplier (id, supplier_name) VALUES (1, 'Self-product');
INSERT INTO wms.supplier (id, supplier_name) VALUES (2, 'BlueRiver Industrial Trading');
INSERT INTO wms.supplier (id, supplier_name) VALUES (3, 'NovaLink Wholesale');
INSERT INTO wms.supplier (id, supplier_name) VALUES (4, 'PrimeStone Materials');
INSERT INTO wms.supplier (id, supplier_name) VALUES (5, 'EastGate Logistics Supply');
INSERT INTO wms.supplier (id, supplier_name) VALUES (6, 'SilverLine Manufacturing');
INSERT INTO wms.supplier (id, supplier_name) VALUES (7, 'TitanCore Distributors');
INSERT INTO wms.supplier (id, supplier_name) VALUES (8, 'HorizonPeak Procurement');
INSERT INTO wms.supplier (id, supplier_name) VALUES (9, 'MetroSource Supplies');
INSERT INTO wms.supplier (id, supplier_name) VALUES (10, 'VertexWay Import & Export');
