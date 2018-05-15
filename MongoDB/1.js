//Find the number of seller in the database
db.items.distinct('Seller._id').length;