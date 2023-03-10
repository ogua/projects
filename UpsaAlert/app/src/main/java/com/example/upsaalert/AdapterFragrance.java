package com.example.upsaalert;

import android.content.Context;
import android.support.annotation.NonNull;
import android.support.v4.view.PagerAdapter;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import java.util.List;

public class AdapterFragrance extends PagerAdapter {
    private List<FragmentModel> model;
    private LayoutInflater layoutInflater;
    private Context context;

    public AdapterFragrance(List<FragmentModel> model, Context context) {
        this.model = model;
        this.context = context;
    }

    @Override
    public int getCount() {
        return model.size();
    }

    @Override
    public boolean isViewFromObject(@NonNull View view, @NonNull Object o) {
        return view.equals(o);
    }

    @NonNull
    @Override
    public Object instantiateItem(@NonNull ViewGroup container, int position) {
        layoutInflater = LayoutInflater.from(context);
        View view = layoutInflater.inflate(R.layout.fragmentitem,container,false);
        ImageView imageView;
        TextView title, Desc;
        imageView = view.findViewById(R.id.imgfrag);
        title = view.findViewById(R.id.ptitle);
        Desc = view.findViewById(R.id.pdesc);

        imageView.setImageResource(model.get(position).getImage());
        title.setText(model.get(position).getTitle());
        Desc.setText(model.get(position).getDesc());

        container.addView(view,0);
        return view;
    }

    @Override
    public void destroyItem(@NonNull ViewGroup container, int position, @NonNull Object object) {
        container.removeView((View) object);
    }





}
