import { CartItem } from "./types";

export const arrayAreEqual = (arr1: any[], arr2: any[]) => {
  if (arr1.length !== arr2.length) {
    return false;
  }

  return arr1.every((value, index) => value === arr2[index]);

}

export const productRoute = (item: CartItem): string => {
  const params = new URLSearchParams();

  Object.entries(item.option_ids).forEach(([typeId, optionId]) => {
    params.append(`options[${typeId}]`, optionId + '');
  });

  return route('product.show', { slug: item.slug }) + '?' + params.toString();
};

