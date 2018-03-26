Select Count(*) From (SELECT userID, Count(DISTINCT category) FROM (SELECT userID, category FROM Item NATURAL JOIN Category) AS Seller GROUP BY userID HAVING Count(DISTINCT category) > 10) AS Above_10;

