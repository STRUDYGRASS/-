#温差和海拔高度的关系
import pymongo
def tem_dif_alt():
    client = pymongo.MongoClient('mongodb://39.106.163.153:27017')
    collection = client.YUNFEI.weathers
    pipeline = [
        {'$group':{'_id':'$NAME','ELEVATION':{'$first':'$ELEVATION'}, 'avg':{'$avg':'$TAVG'}}}
    ]
    minus=[]
    for elem in (collection.aggregate(pipeline)):
        minus.append({'name':elem['_id'],'value':[elem['ELEVATION'],elem['avg'],1 ]})
    print(minus)
if __name__ == '__main__':
    tem_dif_alt()