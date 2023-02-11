a) SELECT * FROM user WHERE dateCreate >= DATE_ADD(CURDATE(), INTERVAL -2 DAY)
b) SELECT u.firstname, u.lastname, u.id as CustomerId, SUM(o.value) as GrandValue FROM orders as o INNER JOIN user as u ON o.userId = u.id GROUP BY u.id;
c) SELECT u.firstname, u.lastname, u.id as CustomerId FROM orders as o INNER JOIN user as u ON o.userId = u.id GROUP BY o.userId HAVING COUNT(o.id) >= 2;
d) SELECT u.firstname, u.lastname, o.id as OrderId, count(oi.id) as ItemCount FROM user as u INNER JOIN orders as o ON u.id = o.userId INNER JOIN orderItem as oi ON o.id = oi.orderId GROUP BY o.id;
e) SELECT u.firstname, u.lastname, o.id as OrderId FROM user as u INNER JOIN orders as o ON u.id = o.userId INNER JOIN orderItem as oi ON o.id = oi.orderId GROUP BY o.id HAVING count(oi.id) >= 2;
f) SELECT u.id, u.firstname, u.lastname FROM user as u INNER JOIN orders as o ON u.id = o.userId INNER JOIN orderItem as oi ON o.id = oi.orderId INNER JOIN product as p ON p.id = oi.productId GROUP BY u.id HAVING COUNT( DISTINCT oi.productId) >= 3;
