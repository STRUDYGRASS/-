#最低气温最低的十个城市   
import pymongo
def min_10():
    client = pymongo.MongoClient('mongodb://39.106.163.153:27017')
    collection = client.YUNFEI.weathers
    pipeline = [
        {'$group':{'_id':'$NAME','min':{'$min':'$TAVG'}}},{'$sort':{'min':1}}
    ]
    min=[[],[]]
    for elem in list(collection.aggregate(pipeline))[:10]:
        min[0].append(elem['_id'])
        min[1].append(elem['min'])
    print(min)
if __name__ == '__main__':
    min_10()