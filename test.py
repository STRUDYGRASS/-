
# import pymongo

# def drawing():   
#     a = [[12,13,14,15],[2,3,4,5]]
#     client = pymongo.MongoClient('mongodb://39.106.163.153:27017') # primary
#     collection = client.YUNFEI.weathers
#     with open("./tmp/test.txt",'w') as f:
#         f.write(str(a))

# if __name__ == '__main__':
#     drawing()

import pymongo
def max_10():
    client = pymongo.MongoClient('mongodb://39.106.163.153:27017') # primary
    collection = client.YUNFEI.weathers
    max={}
    max1=[[],[]]
    for item in collection.distinct('NAME'):
        for i in collection.find({'NAME':item},{'_id':0,'TAVG':1,'NAME':1}).sort([('TAVG',-1)]).limit(1):
            max[i['NAME']]=i['TAVG']
    max10=sorted(max.items(), key = lambda kv:(kv[1], kv[0]),reverse=True)
    a=max10[0:10]
    for i in range(0,10):
        max1[0].append(a[i][0])
        max1[1].append(a[i][1])
    # with open("./tmp/test.txt",'w') as f:
    #     f.write(str(max1))
    print(max1)
if __name__ == '__main__':
    max_10()