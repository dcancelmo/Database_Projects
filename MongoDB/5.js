//Find the number of auctions belonging to exactly four categories
db.items.find({Category: {$size : 4}}).length();