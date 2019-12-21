#绿化覆盖率与平均气温的关系
import pymongo
client = pymongo.MongoClient('mongodb://39.106.163.153:27017')
def green_temp():
    collection1 = client.YUNFEI.weathers
    collection2 = client.YUNFEI.greening
    list1=[]
    list2=[]
    for item in collection2.distinct('城 市'):
        list1.append(item)
    for item in collection1.distinct('NAME'):
        list2.append(item)
    set1=set(list1)
    set2=set(list2)
    set_name=(set1&set2)
    pipeline = [{'$group':{'_id':'$NAME', 'tem_dif':{'$avg':'$TAVG'}}}]
    city_greening={}
    minus=[]
    for item in collection2.find():
        city_greening[item['城 市']]=item['建成区绿化覆盖率 (%) ']
    for elem in (collection1.aggregate(pipeline)):
        if elem['_id']  in set_name:
            minus.append({'name':elem['_id'],'value':[elem['tem_dif'],city_greening[elem['_id']],1 ]})
    print(minus)

if __name__ == '__main__':
    green_temp()