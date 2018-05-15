//Find the number of bidders in the database
db.items.distinct('Bids.Bid.Bidder._id').length;