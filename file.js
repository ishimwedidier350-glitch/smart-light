
import OpenAI from "openai";

const client = new OpenAI({
  apiKey: "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"
});

const response = await client.responses.create({
  model: "gpt-4.1",
  input: "Hello!"
});

console.log(response.output_text);