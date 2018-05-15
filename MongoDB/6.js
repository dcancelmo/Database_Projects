//Compute the average of all First_Bid fields
db.items.aggregate([{$group: {_id: null, Average: {$avg: "$First_Bid"}}}, {$project: {_id:0, Average:1}}]);