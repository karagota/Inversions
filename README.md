This is implementation of the merge-sort algorithm for counting inversions in an integer array.
Inversion is case where the bigger number goes before the smaller in the array.
The brute-force counting of inversions is this:

For (int i=0; i< array_length; i++) {
	For (int j=i+1; j <array_length; j++) {
               if (array[i]>array[j])
		inversions = inversions +1;
	}
} 
