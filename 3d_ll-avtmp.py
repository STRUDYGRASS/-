#经纬度和平均气温的关系
import pymongo
def tem_jw():
    client = pymongo.MongoClient('mongodb://39.106.163.153:27017')
    collection = client.YUNFEI.weathers
    pipeline = [
        {'$group':{'_id':'$NAME','LONGITUDE':{'$first':'$LONGITUDE'}, 'LATITUDE':{'$first':'$LATITUDE'},'tem_dif':{'$avg':'$TAVG'}}}
    ]
    minus=[]
    for elem in (collection.aggregate(pipeline)):
        minus.append([elem['tem_dif'],elem['LONGITUDE'],elem['LATITUDE'] ])
    print(minus)
if __name__ == '__main__':
    tem_jw()