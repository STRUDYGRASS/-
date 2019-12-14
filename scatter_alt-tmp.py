# -*- coding: utf-8 -*-
import pymongo
client = pymongo.MongoClient('mongodb://39.106.163.153:27017') # primary
collection = client.YUNFEI.weathers
def average():
    ave=0
    aver={}
    for item in collection.distinct('NAME'):
        sum_total=n=0
        for i in collection.find({'NAME':item},{'_id':0,'TAVG':1,'NAME':1}):
            sum_total=sum_total+i['TAVG']
            n=n+1
        for i in collection.find({'NAME':item},{'_id':0,'TAVG':1,'NAME':1}).sort([('TAVG',-1)]).limit(1):
            max=i['TAVG']
        for i in collection.find({'NAME':item},{'_id':0,'TAVG':1,'NAME':1,'ELEVATION':1,'LATITUDE':1,'LONGITUDE':1}).sort([('TAVG',1)]).limit(1):
            min=i['TAVG']
            ele=i['ELEVATION']
            la=i['LATITUDE']
            lo=i['LONGITUDE']
        ave=float(sum_total)/n
        tem_dif=max-min
        d1=aver.setdefault(item,{})
        d1.setdefault('average',ave)
        d1.setdefault('tem_dif',tem_dif)
        d1.setdefault('ELEVATION',ele)
        d1.setdefault('LATITUDE',la)
        d1.setdefault('LONGITUDE',lo)
    return aver

def tem_alt():
    aver=average()
    tem_alt=[]
    for item in aver:
        tem_alt.append( [ aver[item]['average'],aver[item]['ELEVATION']，1  ])
    print (tem_alt)

if __name__ == '__main__':
    tem_alt()