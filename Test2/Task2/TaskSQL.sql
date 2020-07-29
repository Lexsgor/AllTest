
--a. Для заданного списка товаров получить названия всех категорий, в которых представлены товары ( name )

SELECT category.name FROM category 
    INNER JOIN link ON link.categoryId = category.Id
    INNER JOIN item ON link.itemId = item.Id  
    WHERE item.name IN ('Топоры Intertool HT-0273','Топоры Intertool HT-0260','Электролобзик DeWALT DW349');

--b. Для заданной категории получить список предложений всех товаров из этой категории и ее дочерних категорий;

SELECT item.name FROM category 
        INNER JOIN link ON link.categoryId = category.Id
        INNER JOIN item ON link.itemId = item.Id  
        WHERE category.Id IN ( SELECT id FROM category WHERE Category LIKE CONCAT(( SELECT Category FROM category WHERE Name = 'Электролобзики'),'%'));

-- c. Для заданного списка категорий получить количество предложений товаров в каждой категории;

Select category.name, count(distinct link.itemId) as products_count 
    from category 
        inner join link on category.id = link.categoryId
        group by category.name
        HAVING category.name IN ('Электролобзики DeWALT', 'Топоры Intertool');


-- d. Для заданного списка категорий получить общее количество уникальных предложений товара;

SELECT  COUNT(DISTINCT link.itemId) AS Number FROM link 
    INNER JOIN category ON link.categoryId = category.Id
    WHERE category.name IN ('Электролобзики DeWALT', 'Топоры Intertool');

-- e. Для заданной категории получить ее полный путь в дереве (breadcrumb, «хлебные крошки»).

SELECT DISTINCT( category.category, category.name )
    FROM category 
    WHERE category.category = CONCAT ((SELECT SUBSTRING_INDEX(category.category,'_',1) FROM category WHERE category.name = 'Электролобзики DeWALT'),'_')
    OR category.category = CONCAT ((SELECT SUBSTRING_INDEX(category.category,'_',2) FROM category WHERE category.name = 'Электролобзики DeWALT'),'_')
    OR category.category = CONCAT ((SELECT SUBSTRING_INDEX(category.category,'_',3) FROM category WHERE category.name = 'Электролобзики DeWALT'),'_') 
    OR category.name = 'Электролобзики DeWALT' 
    ORDER BY category.category;


--Create
CREATE TABLE `testphp`.`category` ( `id` INT NOT NULL , `name` TEXT NOT NULL , `category` TEXT NOT NULL , PRIMARY KEY (`id`)) 
    ENGINE = InnoDB;

INSERT INTO `category` (`id`, `name`, `category`) VALUES 
('1', 'Инструменты', '1_'),
('2', 'Ручной инструмент', '1_1_'),
('3', 'Электроинструмент', '1_2_'),
('4', 'Топоры', '1_1_1_'),
('5', 'Молотки', '1_1_2_'),
('6', 'Перфораторы', '1_2_1_'),
('7', 'Электролобзики', '1_2_2_'),
('8', 'Топоры Fiskars', '1_1_1_1'),
('9', 'Топоры Intertool', '1_1_1_2'),
('10', 'Молотки Master Tool', '1_1_2_1'),
('11', 'Молотки Intertool', '1_1_2_2'),
('12', 'Перфораторы Bosch', '1_2_1_1'),
('13', 'Перфораторы Makita', '1_2_1_2'),
('14', 'Электролобзики DeWALT', '1_2_2_1'),
('15', 'Электролобзики Metabo', '1_2_2_2');

CREATE TABLE `testphp`.`item` ( `id` INT NOT NULL , `name` TEXT NOT NULL , `cost` FLOAT NOT NULL , PRIMARY KEY (`id`)) 
    ENGINE = InnoDB;

INSERT INTO `item` (`id`, `name`, `cost`) VALUES 
('1', 'Топор Fiskars X7-XS', '124'),
('2', 'Топор Fiskars Solid A6', '154'),
('3', 'Топоры Intertool HT-0260', '165'),
('4', 'Топоры Intertool HT-0273', '148'),
('5', 'Молоток Intertool HT-0250', '56'),
('6', 'Молоток Intertool HT-0243', '67'),
('7', 'Молоток Master Tool 02-1312', '47'),
('8', 'Молоток Master Tool 02-1305', '78'),
('9', 'Перфоратор Bosch GBH 2-26 DFR Professional 061125476D', '957'),
('10', 'Перфоратор Bosch GBH 2-26 DRE Professional 0615990L43', '1028'),
('11', 'Перфоратор Makita HR2470X', '1135'),
('12', 'Перфоратор Makita HR140DWAJ', '1216'),
('13', 'Электролобзик DeWALT DW349', '346'),
('14', 'Электролобзик DeWALT DCS335NT', '567'),
('15', 'Электролобзик Metabo STEB 65 Quick 601030000', '678'),
('16', 'Электролобзик Metabo STE 100 Quick 601100000', '564');

CREATE TABLE `testphp`.`link` ( `itemId` INT NOT NULL , `categoryId` INT NOT NULL ) ENGINE = InnoDB;

INSERT INTO `link` (`itemId`, `categoryId`) VALUES 
('1','8'),('2','8'),('3','9'),('4','9'),('5','10'),
('6','10'),('7','11'),('8','11'),('9','12'),('10','12'),
('11','13'),('12','13'),('13','14'),('14','14'),('15','15'),
('16','15'),('5','5'),('6','5'),('7','5'),('8','5'),
('1','4'),('2','4'),('3','4'),('4','4'),('9','6'),
('10','6'),('11','6'),('12','6'),('13','7'),('14','7'),
('15','7'),('16','7');

ALTER TABLE `link` ADD INDEX(`categoryId`);
ALTER TABLE `link` ADD INDEX(`itemId`);

ALTER TABLE `testphp`.`category` ADD INDEX `indexCategoryName` (`name`(6));
ALTER TABLE `testphp`.`category` ADD INDEX `indexCategoryCategory` (`category`(6));
ALTER TABLE `testphp`.`category` ADD INDEX `indexCategoryId` (`id`);

ALTER TABLE `testphp`.`item` ADD INDEX `indexsItemName` (`name`(6));
ALTER TABLE `testphp`.`item` ADD UNIQUE `indexsItemId` (`id`);




