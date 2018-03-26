Select Item.itemID
FROM Item, (
	SELECT itemID, MAX(buy_price) AS max_price 
	FROM Item
	) AS Max_Table
WHERE buy_price=max_price;
