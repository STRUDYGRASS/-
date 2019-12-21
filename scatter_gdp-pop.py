#GDP和人口数量的关系
import pymongo
def citizens_GDP():
    client = pymongo.MongoClient('mongodb://39.106.163.153:27017')
    collection1 = client.YUNFEI.area
    collection2 = client.YUNFEI.GDP
    list1=[]
    list2=[]
    for item in collection1.distinct('城市名称'):
        list1.append(item)
    for item in collection2.distinct('城市'):
        list2.append(item)
    set_name=(set(list1)&set(list2))
    
    city_GDP={}
    minus=[]
    for item in collection2.find():
        city_GDP[item['城市']]=item['2016年']
        
    for elem in collection1.find():
        if elem['城市名称'] in set_name:
            minus.append({'name':elem['城市名称'],'value':[elem['市区人口']+elem['城区人口'],city_GDP[elem['城市名称']],1]})
    print(minus)
if __name__ == '__main__':
    citizens_GDP()