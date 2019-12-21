#人均GDP和海拔的关系
import pymongo
client = pymongo.MongoClient('mongodb://39.106.163.153:27017')
def eleva_GDP():
    collection1 = client.YUNFEI.weathers
    collection2 = client.YUNFEI.PERGDP
    list1=[]
    list2=[]
    for item in collection2.distinct('地级市'):
        list1.append(item)
    for item in collection1.distinct('NAME'):
        list2.append(item)
    set1=set(list1)
    set2=set(list2)
    set_name=(set1&set2)
    pipeline = [
        {'$group':{'_id':'$NAME','ELEVATION':{'$first':'$ELEVATION'}}}
    ]
    elevation_GDP={}
    minus=[]
    for item in collection2.find():
        elevation_GDP[item['地级市']]=item['2016年人均GDP（元）']
    for elem in (collection1.aggregate(pipeline)):
        if elem['_id']  in set_name:
            minus.append({'name':elem['_id'],'value':[elem['ELEVATION'],elevation_GDP[elem['_id']],1 ]})
    print(minus)
    
if __name__ == '__main__':
    eleva_GDP()