#GDP和绿化率的关系(value:绿化率 GDP)
import pymongo
def greening_GDP():
    client = pymongo.MongoClient('mongodb://39.106.163.153:27017')
    collection1 = client.YUNFEI.greening
    collection2 = client.YUNFEI.GDP
    list1=[]
    list2=[]
    for item in collection1.distinct('城 市'):
        list1.append(item)
    for item in collection2.distinct('城市'):
        list2.append(item)
    set_name=(set(list1)&set(list2))
    
    city_GDP={}
    minus=[]
    for item in collection2.find():
        city_GDP[item['城市']]=item['2016年']
        
    for elem in collection1.find():
        if elem['城 市'] in set_name:
            minus.append({'name':elem['城 市'],'value':[elem['建成区绿化覆盖率 (%) '],city_GDP[elem['城 市']],1]})
    print(minus)
if __name__ == '__main__':
    greening_GDP()