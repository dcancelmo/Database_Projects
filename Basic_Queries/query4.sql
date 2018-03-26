Select COUNT(*) FROM (SELECT DISTINCT userID, rating FROM User NATURAL JOIN Item) AS Seller WHERE Seller.rating>1000;

