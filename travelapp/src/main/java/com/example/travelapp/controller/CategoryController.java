package com.example.travelapp.controller;

import com.example.travelapp.model.Category;
import com.example.travelapp.repository.CategoryRepository;
import com.example.travelapp.service.CategoryService;
import com.fasterxml.jackson.databind.annotation.JsonValueInstantiator;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.validation.annotation.Validated;
import org.springframework.web.bind.annotation.*;

import java.util.List;
import java.util.Map;
import java.util.NoSuchElementException;

@RestController
@RequestMapping("/category")
@CrossOrigin
public class CategoryController {
    @Autowired
    private CategoryService categoryService;

    @GetMapping
    public ResponseEntity<?> getListCategory(){
        List<Category> categories= categoryService.getAllCategory();
        return ResponseEntity.ok(categories);
    }
    @GetMapping("/active")
    public ResponseEntity<?> getListCategoryActive(){
        List<Category> categories= categoryService.getCategoryActive();
        return ResponseEntity.ok(categories);
    }
    @GetMapping("/home")
    public ResponseEntity<?> getListCategoryHome(){
        List<Category> categories= categoryService.getCategoryHome();
        return ResponseEntity.ok(categories);
    }
    @GetMapping("/{id}")
    public ResponseEntity<?> get(@PathVariable Long id){
        try {
            Category category=categoryService.getCategory(id);
            return  new ResponseEntity<Category>(category, HttpStatus.OK);

        }catch (NoSuchElementException e){
            return  new ResponseEntity<Category>(HttpStatus.NOT_FOUND);
        }
    }
    @PostMapping(produces = "application/json")
    public ResponseEntity<?> add( @RequestBody Category category){
         return new ResponseEntity<>(categoryService.save(category),HttpStatus.OK);
    }
    @PutMapping(path = "/{id}")
    public int update(@RequestBody Category category,@PathVariable Long id){
        try{
            Category placesExist = categoryService.getCategory(id);
             return categoryService.update(id,category);

        }
        catch (NoSuchElementException e){
            return 0;
        }
    }
    @DeleteMapping("/{id}")
    public Map<String,Object> delete(@PathVariable Long id)
    {
        return  categoryService.deleteCategory(id);
    }




}
