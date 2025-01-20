import tensorflow as tf
import pickle
import numpy as np
import sys

class IA():
    def __init__(self):
        with open('/app/code/tokenizer.dump', 'rb') as f:
            self.tokenize = pickle.load(f)

        self.model = tf.lite.Interpreter('/app/code/sql_inject_model.tflite')
        self.model.allocate_tensors()

    def predict(self, data, max_length=216):
        sequences = self.tokenize.texts_to_sequences([data])
        padded = tf.keras.preprocessing.sequence.pad_sequences(sequences, maxlen=max_length, padding='post', truncating='post')
        input_data = np.array(padded, dtype=np.float32)

        input_details = self.model.get_input_details()
        output_details = self.model.get_output_details()

        self.model.set_tensor(input_details[0]['index'], input_data)
        self.model.invoke()
        output_data = self.model.get_tensor(output_details[0]['index'])

        print(f"Probability of injection {output_data[0][0]}", file=sys.stderr)

        return output_data[0][0]
