#海拔高度和人口的关系
import pymongo
def citizens_alt():
    client = pymongo.MongoClient('mongodb://39.106.163.153:27017')
    collection1 = client.YUNFEI.area
    collection2 = client.YUNFEI.weathers
    list1=[]
    list2=[]
    for item in collection1.distinct('城市名称'):
        list1.append(item)
    for item in collection2.distinct('NAME'):
        list2.append(item)
    set_name=(set(list1)&set(list2))
    pipeline = [{'$group':{'_id':'$NAME', 'alt':{'$first':'$ELEVATION'}}}]   
    citizens={}
    minus=[]
    for item in collection1.find():
        citizens[item['城市名称']]=item['市区人口']+item['城区人口'] 
    for elem in (collection2.aggregate(pipeline)):
        if elem['_id'] in set_name:
            minus.append({'name':elem['_id'],'value':[elem['alt'],citizens[elem['_id']],1]})
    print(minus)
if __name__ == '__main__':
    citizens_alt()