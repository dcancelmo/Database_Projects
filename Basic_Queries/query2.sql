SELECT COUNT(*)
FROM (
	SELECT itemID, COUNT(DISTINCT category) AS NumCategories
	FROM Category
	GROUP BY itemID
	) AS GroupingTable
WHERE NumCategories=4;
