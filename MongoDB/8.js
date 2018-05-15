//Delete all the auction documents where seller rating is less than zero (0)
db.items.remove({"Seller._Rating": {$lt: 0}});