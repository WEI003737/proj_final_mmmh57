-- 所有款式的所有顏色的所有尺寸 (很長)-------------------------------------
SELECT
products.sid AS pro_sid,
products.name AS pro_name,
color.sid AS color_sid,
color.color,
size.*
FROM
products
JOIN
color
ON
(products.sid = color.pro_sid)
JOIN
size
ON
color.sid = size.color_sid

-- 商品列表頁: 顏色的第一筆 (生成商品單位) ---------------------------------
SELECT DISTINCT
pro_sid,
first_value(pro_pic) over (partition BY pro_sid),
first_value(color) over (partition BY pro_sid)
FROM color
