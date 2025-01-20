import tensorflow as tf
import pickle
from tensorflow.keras.preprocessing.sequence import pad_sequences


loaded_model = tf.keras.models.load_model("sql_inject_model.h5")
with open("tokenizer.dump", "rb") as f:
    tokenizer = pickle.load(f)


#########NEW RÉCUPÉRATION DE LA DONNÉE SQL################
new_queries = ["SELECT * FROM users WHERE username='admin' OR 1=1;--"]
##########################################################
new_sequences=tokenizer.texts_to_sequences(new_queries)
new_padded = pad_sequences(new_sequences, maxlen=max_length, padding='post', truncating='post')
predictions = model.predict(new_padded)

for query, pred in zip(new_queries, predictions):
    print(f"\nQuery: {query}")
    print(f"Prediction (probabilité d'injection SQL): {pred[0]:.2f}\n")
