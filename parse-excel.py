# Import pandas
import pandas as pd
import json
# Load the xlsx file
excel_data = pd.read_excel('yazio_101.xlsx')
# Read the values of the file in the dataframe
data = pd.DataFrame(excel_data , columns=['Product', 'Valeur_calorique','Proteine','Lipides','Glucides','Sodium','Potassium','Magnesium','Calcium'])
# Print the content
ary = data.to_numpy();
mylist = ary.tolist();
ret = json.dumps(mylist);
print(ret)
#retJson = data.to_json(orient='index') 
