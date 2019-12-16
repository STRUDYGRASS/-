#最高气温最高的十个城市
import pymongo
def max_10():
    client = pymongo.MongoClient('mongodb://39.106.163.153:27017')
    collection = client.YUNFEI.weathers
    pipeline = [
        {'$group':{'_id':'$NAME','max':{'$max':'$TAVG'}}},{'$sort':{'max':-1}}
    ]
    max=[[],[]]
    for elem in list(collection.aggregate(pipeline))[:10]:
        max[0].append(elem['_id'])
        max[1].append(elem['max'])
    print(max)
if __name__ == '__main__':
    max_10()
    