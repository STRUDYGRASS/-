import pymongo
def tem_PERGDP():
    client = pymongo.MongoClient('mongodb://39.106.163.153:27017')
    collection1 = client.YUNFEI.weathers
    collection2 = client.YUNFEI.PERGDP
    list1=[]
    list2=[]
    for item in collection2.distinct('地级市'):
        list1.append(item)
    for item in collection1.distinct('NAME'):
        list2.append(item)
    set_name=(set(list1)&set(list2))
    pipeline = [{'$group':{'_id':'$NAME', 'tem_dif':{'$avg':'$TAVG'}}}]    
    city_PERGDP={}
    minus=[]
    for item in collection2.find():
        city_PERGDP[item['地级市']]=item['2016年人均GDP（元）']
    for elem in (collection1.aggregate(pipeline)):
        if elem['_id'] in set_name and city_PERGDP[elem['_id']]!='':
            minus.append({'name':elem['_id'],'value':[elem['tem_dif'],city_PERGDP[elem['_id']],1 ]})
    print(minus)
if __name__ == '__main__':
    tem_PERGDP()