#GDP与市区暂住人口的关系
import pymongo
client = pymongo.MongoClient('mongodb://39.106.163.153:27017')
def cityp_GDP():
    collection1 = client.YUNFEI.PERGDP
    collection2 = client.YUNFEI.area
    list1=[]
    list2=[]
    for item in collection1.distinct('地级市'):
        list1.append(item)
    for item in collection2.distinct('城市名称'):
        list2.append(item)
    s_list=set(list1).intersection(set(list2))
    temporarypopulation_GDP={}
    minus=[]
    n=0
    for item in collection1.find():
        temporarypopulation_GDP[item['地级市']]=item['2016年GDP（亿元）']
    for elem in collection2.find():
        if elem['城市名称'] in s_list:
            minus.append({'name':elem['城市名称'],'value':[elem['市区暂住\n人口'],temporarypopulation_GDP[elem['城市名称']],1]})
            n=n+1
    print(minus)
    
if __name__ == '__main__':
    cityp_GDP()